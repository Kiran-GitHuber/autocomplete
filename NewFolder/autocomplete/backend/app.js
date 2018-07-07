const express = require("express");
const bodyParser = require("body-parser");

const app = express();

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended: false}));

app.use((req, res, next) => {
  res.setHeader("Access-Control-Allow-Origin", "*");
  res.setHeader(
    "Access-Control-Allow-Headers",
    "Origin, X-Requested-With, Content-Type, Accept"
  );
  res.setHeader(
    "Access-Control-Allow-Methods",
    "GET, POST, PATCH, DELETE, OPTIONS"
  );
  next();
});

app.get("/suggest_cities", (req, res, next) => {
  const searchBy = req.query.start;
  const atmost = req.query.atmost;
  console.log('searchBy: ' + searchBy + ' atmost: ' + atmost);
  if (searchBy) {
    const posts = [{
      "id": 65,
      "country": "IND",
      "name": "Jammu and Kashmir",
      "abbr": "JK",
      "area": "12541302SKM",
      "largest_city": "Srinagar Jammu",
      "capital": "Srinagar Jammu"
    }, {
      "id": 66,
      "country": "IND",
      "name": "Jharkhand",
      "abbr": "JH",
      "area": "32988134SKM",
      "largest_city": "Ranchi",
      "capital": "Ranchi"
    }, {
      "id": 67,
      "country": "IND",
      "name": "Karnataka",
      "abbr": "KA",
      "area": "61095297SKM",
      "largest_city": "Bangalore",
      "capital": "Bangalore"
    }, {
      "id": 68,
      "country": "IND",
      "name": "Kerala",
      "abbr": "KL",
      "area": "33406061SKM",
      "largest_city": "Thiruvananthapuram",
      "capital": "Thiruvananthapuram"
    }, {
      "id": 69,
      "country": "IND",
      "name": "Madhya Pradesh",
      "abbr": "MP",
      "area": "72626809SKM",
      "largest_city": "Bhopal",
      "capital": "Bhopal"
    }, {
      "id": 70,
      "country": "IND",
      "name": "Maharashtra",
      "abbr": "MH",
      "area": "112374333SKM",
      "largest_city": "Mumbai",
      "capital": "Mumbai"
    }, {
      "id": 71,
      "country": "IND",
      "name": "Manipur",
      "abbr": "MN",
      "area": "2855794SKM",
      "largest_city": "Imphal",
      "capital": "Imphal"
    }, {
      "id": 72,
      "country": "IND",
      "name": "Meghalaya",
      "abbr": "ML",
      "area": "2966889SKM",
      "largest_city": "Shillong",
      "capital": "Shillong"
    }, {
      "id": 73,
      "country": "IND",
      "name": "Mizoram",
      "abbr": "MZ",
      "area": "1097206SKM",
      "largest_city": "Aizawl",
      "capital": "Aizawl"
    }, {
      "id": 74,
      "country": "IND",
      "name": "Nagaland",
      "abbr": "NL",
      "area": "1978502SKM",
      "largest_city": "Kohima",
      "capital": "Kohima"
    }, {
      "id": 75,
      "country": "IND",
      "name": "Odisha",
      "abbr": "OD",
      "area": "41974218SKM",
      "largest_city": "Bhubaneswar",
      "capital": "Bhubaneswar"
    }, {
      "id": 76,
      "country": "IND",
      "name": "Punjab",
      "abbr": "PB",
      "area": "27743338SKM",
      "largest_city": "Amritsar",
      "capital": "Chandigarh"
    }, {
      "id": 77,
      "country": "IND",
      "name": "Rajasthan",
      "abbr": "RJ",
      "area": "68548437SKM",
      "largest_city": "Jaipur",
      "capital": "Jaipur"
    }, {
      "id": 78,
      "country": "IND",
      "name": "Sikkim",
      "abbr": "SK",
      "area": "610577SKM",
      "largest_city": "Gangtok",
      "capital": "Gangtok"
    }, {
      "id": 79,
      "country": "IND",
      "name": "Tamil Nadu",
      "abbr": "TN",
      "area": "72147030SKM",
      "largest_city": "Chennai",
      "capital": "Chennai"
    }, {
      "id": 80,
      "country": "IND",
      "name": "Telangana",
      "abbr": "TS",
      "area": "3519397837SKM",
      "largest_city": "Hyderabad",
      "capital": "Hyderabad"
    }, {
      "id": 81,
      "country": "IND",
      "name": "Tripura",
      "abbr": "TR",
      "area": "3673917SKM",
      "largest_city": "Agartala",
      "capital": "Agartala"
    }, {
      "id": 82,
      "country": "IND",
      "name": "Uttar Pradesh",
      "abbr": "UP",
      "area": "199812341SKM",
      "largest_city": "Lucknow",
      "capital": "Lucknow"
    }, {
      "id": 83,
      "country": "IND",
      "name": "Uttarakhand",
      "abbr": "UK",
      "area": "10086292SKM",
      "largest_city": "Dehradun",
      "capital": "Dehradun"
    }, {
      "id": 84,
      "country": "IND",
      "name": "West Bengal",
      "abbr": "WB",
      "area": "91276115SKM",
      "largest_city": "Kolkata",
      "capital": "Kolkata"
    }, {
      "id": 85,
      "country": "IND",
      "name": "Andaman and Nicobar Islands",
      "abbr": "AN",
      "area": "8249SKM",
      "largest_city": "Port Blair",
      "capital": "Port Blair"
    }, {
      "id": 86,
      "country": "IND",
      "name": "Chandigarh",
      "abbr": "CH",
      "area": "114SKM",
      "largest_city": "Chandigarh",
      "capital": "Chandigarh"
    }, {
      "id": 87,
      "country": "IND",
      "name": "Dadra and Nagar Haveli",
      "abbr": "DN",
      "area": "491SKM",
      "largest_city": "Silvassa",
      "capital": "Silvassa"
    }, {
      "id": 88,
      "country": "IND",
      "name": "Daman and Diu",
      "abbr": "DD",
      "area": "112SKM",
      "largest_city": "Daman",
      "capital": "Daman"
    }, {
      "id": 89,
      "country": "IND",
      "name": "Delhi",
      "abbr": "DL",
      "area": "1490SKM",
      "largest_city": "New Delhi",
      "capital": "New Delhi"
    }, {
      "id": 56,
      "country": "IND",
      "name": "Andhra Pradesh",
      "abbr": "AP",
      "area": "49506799SKM",
      "largest_city": "Hyderabad Amaravati",
      "capital": "Hyderabad Amaravati"
    }, {
      "id": 57,
      "country": "IND",
      "name": "Arunachal Pradesh",
      "abbr": "AR",
      "area": "1383727SKM",
      "largest_city": "Itanagar",
      "capital": "Itanagar"
    }, {
      "id": 58,
      "country": "IND",
      "name": "Assam",
      "abbr": "AS",
      "area": "31205576SKM",
      "largest_city": "Dispur",
      "capital": "Dispur"
    }, {
      "id": 59,
      "country": "IND",
      "name": "Bihar",
      "abbr": "BR",
      "area": "104099452SKM",
      "largest_city": "Patna",
      "capital": "Patna"
    }, {
      "id": 60,
      "country": "IND",
      "name": "Chhattisgarh",
      "abbr": "CG",
      "area": "25545198SKM",
      "largest_city": "Naya Raipur",
      "capital": "Naya Raipur"
    }, {
      "id": 61,
      "country": "IND",
      "name": "Goa",
      "abbr": "GA",
      "area": "1458545SKM",
      "largest_city": "Panaji",
      "capital": "Panaji"
    }, {
      "id": 62,
      "country": "IND",
      "name": "Gujarat",
      "abbr": "GJ",
      "area": "60439692SKM",
      "largest_city": "Gandhinagar",
      "capital": "Gandhinagar"
    }, {
      "id": 63,
      "country": "IND",
      "name": "Haryana",
      "abbr": "HR",
      "area": "25351462SKM",
      "largest_city": "Chandigarh",
      "capital": "Chandigarh"
    }, {
      "id": 64,
      "country": "IND",
      "name": "Himachal Pradesh",
      "abbr": "HP",
      "area": "6864602SKM",
      "largest_city": "Shimla Dharamshala",
      "capital": "Shimla Dharamshala"
    }, {
      "id": 90,
      "country": "IND",
      "name": "Lakshadweep",
      "abbr": "LD",
      "area": "32SKM",
      "largest_city": "Kavaratti",
      "capital": "Kavaratti"
    }, {
      "id": 91,
      "country": "IND",
      "name": "Puducherry",
      "abbr": "PY",
      "area": "492SKM",
      "largest_city": "Pondicherry",
      "capital": "Pondicherry"
    }];
    /* const filteredItems = posts.filter(item => item.largest_city.toLowerCase().indexOf(searchBy.toLowerCase()) > -1);*/
    /*
      Finding cities in an array of objects which starts with
     */
    const filteredItems = posts.filter(item => item.largest_city.toLowerCase().startsWith(searchBy.toLowerCase()));
    /*
      Seperate, sort and remove duplicates in filtered cities which starts with
     */
    const filteredItemValues = filteredItems.map(item => item.largest_city).sort().filter((elem, pos, arr) =>
      arr.indexOf(elem) == pos);
    /*
    Finding if any atmost value from api payload or defaults with total count
     */
    const filteredItemsCount = atmost ? atmost : filteredItemValues.length;
    /*
    slicing only the list with atmost
     */
    const slicedList = filteredItemValues.slice(0, filteredItemsCount);
    res.status(200).json({
      message: "results fetched successfully!",
      posts: slicedList
    });
  }
  res.status(404).json({
    message: "Alas you hit the wrong api!"
  });
});

module.exports = app;
