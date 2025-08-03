<div x-data>
    <style>
        .btn-maps {
            color: white;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            flex: 1;
            overflow-y: auto;
            background-color: #D97706;
            background-color: #D97706;
        }

        .btn-maps:hover {
            background-color: #F59E0B;
        }
    </style>
    <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">Lokasi</span>
    <div id="map-container" class="rounded-lg flex flex-col md:flex-row w-full min-h-24 gap-4">
        <iframe id="mapFrame" width="100%" height="100%" style="border:0;" loading="lazy" allowfullscreen
            src="https://maps.google.com/maps?q=-7.9889382,113.2263111&z=15&output=embed"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        <div class="flex flex-col items-start mb-4 text-sm" style="gap: 1rem;">
            <button id="search-by-loc" class="btn-maps">
                Gunakan Lokasi Saat Ini
            </button>
            <p class="text-center mb-0 font-semibold">atau</p>
            <div class="flex flex-col md:flex-row gap-1">
                <input type="text" name="latitude" required placeholder="Longitude (contoh: -8.1691328)"
                    id="latitude"
                    class="min-w-16 rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm placeholder-gray-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none" />

                <input type="text" name="longitude" required placeholder="Latitude (contoh: 113.699675)"
                    id="longitude"
                    class="min-w-16 rounded-lg border border-gray-300 bg-white px-3 py-2 text-sm text-gray-900 shadow-sm placeholder-gray-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 focus:outline-none" />

                <button id="search-by-latlong" class="btn-maps">Cari</button>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('#search-by-loc').addEventListener('click', (e) => {
            e.preventDefault();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showByLocation, handleError);
            } else {
                alert('Browser tidak mendukung geolocation.');
            }
        });
        document.querySelector('#search-by-latlong').addEventListener('click', (e) => {
            e.preventDefault();
            const inputlat = document.querySelector('#latitude').value;
            const inputlon = document.querySelector('#longitude').value;
            if (!isValidLatitude(inputlat) || !isValidLongitude(inputlon)) {
                alert('Longitude dan Latitude tidak valid!');
            }
            showOnMap(inputlat, inputlon);
            Livewire.emit('setCoordinates', inputlat, inputlon);
        });
        
        function showByLocation(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            
            showOnMap(lat, lon);
            Livewire.emit('setCoordinates', lat, lon);
        }

        function isValidLatitude(value) {
            return /^-?([1-8]?\d(\.\d+)?|90(\.0+)?)$/.test(value.trim());
        }

        function isValidLongitude(value) {
            return /^-?(1[0-7]\d(\.\d+)?|180(\.0+)?|[1-9]?\d(\.\d+)?)$/.test(value.trim());
        }

        function showOnMap(lat, lon) {
            document.getElementById("latitude").value = lat;
            document.getElementById("longitude").value = lon;

            const iframe = document.getElementById("mapFrame");
            iframe.src = `https://maps.google.com/maps?q=${lat},${lon}&z=15&output=embed`;
        }

        function handleError(error) {
            let message = "";
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    message = "Akses lokasi ditolak.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    message = "Informasi lokasi tidak tersedia.";
                    break;
                case error.TIMEOUT:
                    message = "Permintaan lokasi melebihi batas waktu.";
                    break;
                default:
                    message = "Kesalahan tidak diketahui.";
            }
            alert(message);
        }
    </script>
</div>
