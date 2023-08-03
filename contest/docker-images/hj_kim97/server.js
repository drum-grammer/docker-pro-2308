const axios = require("axios");
const translate = require("translate-google");
const readline = require("readline");
const reader = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
});

const countryCodeToName = {
  KOREA: "Korea",
  JAPEN: "Japen",
  USA: "USA",
  UK: "UK",
  AMERICA: "America",
  CHINA: "China",
  HONGKONH: "Hongkong",
  VIETNAM: "Vietnam",
  PARIS: "Paris",
  LONDON: "London",
  FRANCE: "France",
  RUSSIA: "Russia",
  CANADA: "Canada",
  BRAZIL: "Brazil",
  INDIA: "India",
  MEXICO: "Mexico",
  MONGOLIA: "Mongolia",
  SPAIN: "Spain",
  ITALY: "Italy",
  PERU: "Peru",
  HELP: "HELP",
  EXIT: "EXIT",
};

function printAllCountry() {
  console.log("현재 프로그램에 등록된 키워드(나라&명령어)는 아래와 같습니다.");
  console.log(Object.keys(countryCodeToName), "\n");
}

function hasCountryCode(key) {
  return Object.keys(countryCodeToName).some((item) => item === key);
}

async function translateText(text) {
  try {
    const translatedText = await translate(text, { from: "ko", to: "en" });
    return translatedText;
  } catch (error) {
    return text;
  }
}

async function printWeatherByCountry(country) {
  await axios({
    method: "get",
    url: `https://wttr.in/${country}?format=3`,
  })
  .then((response) => {
    console.log(response.data);
  })
  .catch((error) => {
    console.log(error);
  });
}

async function handleInput(input) {
  const country = input.trim();
  const translateCountry = await translateText(country);
  const upperCaseCountry = translateCountry.toUpperCase();
  const isExists = hasCountryCode(upperCaseCountry);

  if (isExists) {
    const englishCountry = countryCodeToName[upperCaseCountry];
    if (englishCountry === "EXIT") {
      reader.close();
    } else if(englishCountry === "HELP") {
      printAllCountry();
      reader.prompt();
    } else {
      await printWeatherByCountry(englishCountry);
      reader.prompt();
    }
  } else {
    console.log(`해당 장소(${country})는 찾을 수 없습니다. 관리자에게 문의해주세요.\n`);
    reader.prompt();
  }
}

console.log("날씨 조회 프로그램이 실행되었습니다. 명령어를 입력하여 나라별 날씨를 조회할 수 있습니다.")
console.log("그 외 도움이 필요하면 HELP를 입력해주세요.\n");

reader.setPrompt("국가를 입력하세요 (EXIT를 입력하면 프로그램이 종료됩니다): ");
reader.prompt();

reader.on("line", handleInput);

reader.on("close", () => {
  console.log("\n프로그램을 종료합니다.");
  process.exit();
});
