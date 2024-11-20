document.addEventListener('DOMContentLoaded', function () {
    const defaultLat = 40.7128; // Default latitude (e.g., NYC)
    const defaultLng = -74.0060; // Default longitude (e.g., NYC)

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, () => showDefaultPosition(defaultLat, defaultLng));
    } else {
        alert("Geolocation is not supported by this browser.");
        showDefaultPosition(defaultLat, defaultLng);
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

    function showDefaultPosition(lat, lng) {
        alert("Using default location as user location is unavailable.");
        initMap(lat, lng);
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
