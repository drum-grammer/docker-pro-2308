from pathlib import Path
from typing import List

import typer

from todo import __app_name__, __version__, database, config, ERRORS, todo

app = typer.Typer()


@app.command()
def init(
        db_path: str = typer.Option(
            str(database.DEFAULT_DB_FILE_PATH),
            "--db-path",
            "-db",
            prompt="to-do 데이터베이스의 위치를 지정해주세요",
        ),
) -> None:
    """Initialize the to-do database."""
    app_init_error = config.init_app(db_path)
    if app_init_error:
        typer.secho(
            f'설정 파일 생성 실패! "{ERRORS[app_init_error]}"',
            fg=typer.colors.RED,
        )
        raise typer.Exit(1)

    db_init_error = database.init_database(Path(db_path))
    if db_init_error:
        typer.secho(
            f'데이터베이스 생성 실패! "{ERRORS[db_init_error]}"',
            fg=typer.colors.RED,
        )
        raise typer.Exit(1)
    else:
        typer.secho(f"{db_path} 에 데이터베이스를 생성했습니다.", fg=typer.colors.GREEN)


@app.command()
def add(
        description: List[str] = typer.Argument(...),
        priority: int = typer.Option(2, "--priority", "-p", min=1, max=3),
) -> None:
    """Add a new to-do with a DESCRIPTION."""
    todoer = get_todoer()
    todo, error = todoer.add(description, priority)
    if error:
        typer.secho(
            f'to-do 추가 실패! "{ERRORS[error]}"',
            fg=typer.colors.RED
        )
        raise typer.Exit(1)
    else:
        typer.secho(
            f"""to-do: "{todo['Description']}" 가 정상적으로 추가되었습니다. """
            f"""우선순위: {priority}""",
            fg=typer.colors.GREEN, )


@app.command(name="list")
def list_all() -> None:
    """List all to-dos."""
    todoer = get_todoer()
    todo_list = todoer.get_todo_list()

    if len(todo_list) == 0:
        typer.secho(
            "to-do가 등록되지 않았습니다.", fg=typer.colors.RED
        )
        raise typer.Exit()

    typer.secho("\nto-do list:\n", fg=typer.colors.BLUE, bold=True)
    columns = (
        "ID.  ",
        "| Priority  ",
        "| Done  ",
        "| Description  ",
    )

    headers = "".join(columns)
    typer.secho(headers, fg=typer.colors.BLUE, bold=True)
    typer.secho("-" * len(headers), fg=typer.colors.BLUE)

    for id, todo in enumerate(todo_list, 1):
        desc, priority, done = todo.values()
        typer.secho(
            f"{id}{(len(columns[0]) - len(str(id))) * ' '}"
            f"| ({priority}){(len(columns[1]) - len(str(priority)) - 4) * ' '}"
            f"| {done}{(len(columns[2]) - len(str(done)) - 2) * ' '}"
            f"| {desc}",
            fg=typer.colors.BLUE,
        )

    typer.secho("-" * len(headers) + "\n", fg=typer.colors.BLUE)


@app.command(name="complete")
def set_done(todo_id: int = typer.Argument(...)) -> None:
    """Complete a to-do by setting it as done using its TODO_ID."""
    todoer = get_todoer()
    todo, error = todoer.set_done(todo_id)

    if error:
        typer.secho(
            f'to-do # "{todo_id}" 완료 실패! "{ERRORS[error]}"',
            fg=typer.colors.RED,
        )
        raise typer.Exit(1)
    else:
        typer.secho(
            f"""to-do # {todo_id} "{todo['Description']}" 완료.""",
            fg=typer.colors.GREEN,
        )


@app.command()
def remove(
        todo_id: int = typer.Argument(...),
        force: bool = typer.Option(
            False,
            "--force",
            "-f",
            help="Force deletion without confirmation.",
        ),
) -> None:
    """Remove a to-do using its TODO_ID."""
    todoer = get_todoer()

    def _remove():
        todo, error = todoer.remove(todo_id)
        if error:
            typer.secho(
                f'to-do # {todo_id} 삭제 실패! "{ERRORS[error]}"',
                fg=typer.colors.RED,
            )
            raise typer.Exit(1)
        else:
            typer.secho(
                f"""to-do # {todo_id}: '{todo["Description"]}' 삭제.""",
                fg=typer.colors.GREEN,
            )

    if force:
        _remove()
    else:
        todo_list = todoer.get_todo_list()
        try:
            todo = todo_list[todo_id - 1]
        except IndexError:
            typer.secho("올바르지 않은 to-do ID입니다.", fg=typer.colors.RED)
            raise typer.Exit(1)

        delete = typer.confirm(
            f"to-do # {todo_id} 삭제: {todo['Description']}?"
        )
        if delete:
            _remove()
        else:
            typer.echo("Operation canceled")


@app.command(name="clear")
def remove_all(
        force: bool = typer.Option(
            ...,
            prompt="모든 to-do를 삭제하시겠습니까?",
            help="Force deletion without confirmation.",
        ),
) -> None:
    """Remove all to-dos."""
    todoer = get_todoer()
    if force:
        error = todoer.remove_all().error
        if error:
            typer.secho(
                f'모든 to-do 삭제 실패! "{ERRORS[error]}"',
                fg=typer.colors.RED,
            )
            raise typer.Exit(1)
        else:
            typer.secho("모든 to-do를 삭제했습니다.", fg=typer.colors.GREEN)
    else:
        typer.echo("Operation canceled")


@app.callback()
def main() -> None:
    return


def _version_callback(value: bool) -> None:
    if value:
        typer.echo(f"{__app_name__} v{__version__}")
        raise typer.Exit()


def get_todoer() -> todo.Todoer:
    if config.CONFIG_FILE_PATH.exists():
        db_path = database.get_database_path(config.CONFIG_FILE_PATH)
    else:
        typer.secho(
            '설정 파일이 아직 만들어지지 않았습니다. 먼저 "todo init" 명령을 실행해주세요.',
            fg=typer.colors.RED,
        )
        raise typer.Exit(1)

    if db_path.exists():
        return todo.Todoer(db_path)
    else:
        typer.secho(
            '데이터베이스를 찾지 못했습니다. 먼저 "todo init" 명령을 실행해주세요.',
            fg=typer.colors.RED,
        )
        raise typer.Exit(1)
