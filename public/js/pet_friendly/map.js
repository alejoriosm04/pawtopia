document.addEventListener('DOMContentLoaded', function () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        alert("Geolocation is not supported by this browser.");
    }

    function showPosition(position) {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;

        const url = new URL(window.location.href);
        url.searchParams.set('lat', lat);
        url.searchParams.set('lng', lng);
        window.history.replaceState({}, '', url);

        initMap(lat, lng);
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("User denied the request for Geolocation.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("The request to get user location timed out.");
                break;
            case error.UNKNOWN_ERROR:
                alert("An unknown error occurred.");
                break;
        }
    }

    function initMap(lat, lng) {
        const userLocation = { lat: lat, lng: lng };
        const map = new google.maps.Map(document.getElementById('map'), {
            center: userLocation,
            zoom: 13
        });

        new google.maps.Marker({
            position: userLocation,
            map: map,
            title: "Your Location",
            icon: {
                url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
            }
        });

        if (window.places && window.places.length > 0) {
            window.places.forEach(place => {
                new google.maps.Marker({
                    position: { lat: place.geometry.location.lat, lng: place.geometry.location.lng },
                    map: map,
                    title: place.name,
                    icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                });
            });
        }
    }
});
