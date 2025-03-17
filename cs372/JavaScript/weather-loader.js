document.addEventListener("DOMContentLoaded", function () {
    const apiKey = "bb37a7808a56bb89cee8eeb8428fcd4e";
    const city = "West Kingston"; // City
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&units=imperial&appid=${apiKey}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const weatherContainer = document.getElementById("weather-container");

            if (data.cod === 200) {
                const temperature = data.main.temp;
                const description = data.weather[0].description;
                const weatherMain = data.weather[0].main.toLowerCase();
                const icon = `https://openweathermap.org/img/wn/${data.weather[0].icon}.png`;
                
                let workMessage = `<p><strong>Temperature:</strong> ${temperature}°F</p>
                                   <p><strong>Condition:</strong> ${description.charAt(0).toUpperCase() + description.slice(1)}</p>
                                   <img src="${icon}" alt="Weather icon">`;

                // Check if it's raining
                if (weatherMain.includes("rain") || weatherMain.includes("thunderstorm") || weatherMain.includes("drizzle")) {
                    workMessage += `<p style="color: red; font-weight: bold;">🚧 Due to rain, we won’t be working today. 🚧</p>`;
                } else {
                    workMessage += `<p style="color: green; font-weight: bold;">✅ We're working as usual today! ✅</p>`;
                }

                weatherContainer.innerHTML = workMessage;
            } else {
                weatherContainer.innerHTML = `<p>Error: ${data.message}</p>`;
            }
        })
        .catch(error => {
            console.error("Weather API Fetch Error:", error);
            document.getElementById("weather-container").innerHTML = `<p>Unable to load weather data.</p>`;
        });
});
