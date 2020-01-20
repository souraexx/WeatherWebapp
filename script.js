var urlAddress = window.location.href;
var LAT, LONG;
let tempertatureDegree = document.querySelector('.temperature-degree');
let tempertatureDescription = document.querySelector('.temperature-description');
let locationTimezone = document.querySelector('.location-timezone');
let temperatureSection = document.querySelector('.temperature');
const temperatureSpan = document.querySelector('.temperature span');
var address = urlAddress.split('=')[1];
const key = 'dce59e91fe804881be14b4181bd7ebd9';
const weatherKey = '524ae5421c79aa01b18fa9c82bd0ca47';
let url = `https://api.opencagedata.com/geocode/v1/json?q=${address}&key=${key}&pretty=1`;
function getGeocode() {
	fetch(url)
		.then((response) => response.json())
		.then((data) => {
			LAT = data.results[0].geometry.lat;
			LONG = data.results[0].geometry.lng;
			getweather(LAT, LONG);
		})
		.catch((err) => console.warn(err.message));
}
function getweather(LAT, LONG) {
	const api = `https://cors-anywhere.herokuapp.com/https://api.darksky.net/forecast/${weatherKey}/${LAT},${LONG}`;
	fetch(api).then((response) => response.json()).then((data) => {
		//x console.log(data);
		const { temperature, summary, icon } = data.currently;
		//Set DOM Elements from the API
		tempertatureDegree.textContent = Math.floor(temperature);
		tempertatureDescription.textContent = summary;
		let city = getCity(LAT, LONG);
		//Set Icons
		setIcons(icon, document.querySelector('.icon'));
		//Change temp degree
		let celcius = (temperature - 32) * (5 / 9);
		temperatureSection.addEventListener('click', () => {
			if (temperatureSpan.textContent === 'F') {
				temperatureSpan.textContent = 'C';
				tempertatureDegree.textContent = Math.floor(celcius);
			} else {
				temperatureSpan.textContent = 'F';
				tempertatureDegree.textContent = Math.floor(temperature);
			}
		});
	});
}
function setIcons(icon, iconID) {
	const skycons = new Skycons({ color: 'white' });
	const currentIcon = icon.replace(/-/g, '_').toUpperCase();
	skycons.play();
	return skycons.set(iconID, Skycons[currentIcon]);
}
function getCity(LAT, LONG) {
	let url2 = `https://api.opencagedata.com/geocode/v1/json?q=${LAT},${LONG}&key=${key}&pretty=1`;
	fetch(url2).then((response) => response.json()).then((data) => {
		console.log(data);
		let city = data.results[0].components.city;
		let town = data.results[0].components.town;
		let country = data.results[0].components.country;
		let county = data.results[0].components.county;
		let village = data.results[0].components.village;
		if (country == 'United States of America') {
			country = 'USA';
		}
		if (country == 'United Kingdom') {
			country = 'UK';
		}
		if (city) {
			locationTimezone.textContent = city + ' / ' + country;
			return city;
		}
		if (village) {
			locationTimezone.textContent = village + ' / ' + country;
			return city;
		}
		if (county) {
			locationTimezone.textContent = county + ' / ' + country;
			return city;
		}
		if (town) {
			locationTimezone.textContent = town + ' / ' + country;
			return city;
		}
	});
}
getGeocode();
