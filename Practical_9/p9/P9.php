<style>
    #state,
    #city {
        display: none;
    }
</style>
<script>
    function loadCountries() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "Countries.php", true);
        xmlhttp.onload = function() {
            if (this.status == 200) {
                var countries = JSON.parse(this.responseText);
                var countryDropdown = document.getElementById("country");
                countries.forEach(function(country) {
                    var option = document.createElement("option");
                    option.text = country.name;
                    option.value = country.id;
                    countryDropdown.appendChild(option);
                });
            } else {
                console.error("Failed to load countries");
            }
        };
        xmlhttp.send();
    }

    function loadStates() {
        var countryId = document.getElementById("country").value;
        if (countryId) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "States.php?country_id=" + countryId, true);
            xmlhttp.onload = function() {
                if (this.status == 200) {
                    var states = JSON.parse(this.responseText);
                    var stateDropdown = document.getElementById("state");
                    stateDropdown.innerHTML = "<option value=''>Select State</option>";
                    states.forEach(function(state) {
                        var option = document.createElement("option");
                        option.text = state.name;
                        option.value = state.id;
                        stateDropdown.appendChild(option);
                    });
                    stateDropdown.style.display = "block"; // Show state dropdown
                    document.getElementById("city").style.display = "none"; // Hide city dropdown
                } else {
                    console.error("Failed to load states");
                }
            };
            xmlhttp.send();
        } else {
            document.getElementById("state").style.display = "none";
            document.getElementById("city").style.display = "none";
        }
    }

    function loadCities() {
        var stateId = document.getElementById("state").value;
        if (stateId) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "Cities.php?state_id=" + stateId, true);
            xmlhttp.onload = function() {
                if (this.status == 200) {
                    var cities = JSON.parse(this.responseText);
                    var cityDropdown = document.getElementById("city");
                    cityDropdown.innerHTML = "<option value=''>Select City</option>";
                    cities.forEach(function(city) {
                        var option = document.createElement("option");
                        option.text = city.name;
                        option.value = city.id;
                        cityDropdown.appendChild(option);
                    });
                    cityDropdown.style.display = "block"; // Show city dropdown
                } else {
                    console.error("Failed to load cities");
                }
            };
            xmlhttp.send();
        } else {
            document.getElementById("city").style.display = "none";
        }
    }
    document.addEventListener("DOMContentLoaded", loadCountries);
</script>
<select id="country" name="country" onchange="loadStates()">
    <option value="">Select Country</option>
</select><br /><br />
<select id="state" name="state" onchange="loadCities()">
    <option value="">Select State</option>
</select><br />
<select id="city" name="city">
    <option value="">Select City</option>
</select>