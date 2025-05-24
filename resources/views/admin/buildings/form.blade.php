<div class="row">
    <div class="col-md-6">

        <div class="mb-3">
            <label>Jenis Properti</label>
            <select name="property_type" id="property_type" class="form-control" required>
                <option value="">Pilih Jenis</option>
                <option value="house" {{ old('property_type', $property->property_type ?? '') == 'house' ? 'selected' : '' }}>Rumah</option>
                <option value="land" {{ old('property_type', $property->property_type ?? '') == 'land' ? 'selected' : '' }}>Tanah</option>
                <option value="apartment" {{ old('property_type', $property->property_type ?? '') == 'apartment' ? 'selected' : '' }}>Apartemen</option>
                <option value="office" {{ old('property_type', $property->property_type ?? '') == 'office' ? 'selected' : '' }}>Kantor</option>
                <option value="warehouse" {{ old('property_type', $property->property_type ?? '') == 'warehouse' ? 'selected' : '' }}>Gudang</option>
                <option value="other" {{ old('property_type', $property->property_type ?? '') == 'other' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Jenis Transaksi</label>
            <select name="transaction_type" class="form-control" required>
                <option value="">Pilih Jenis Transaksi</option>
                <option value="sale" {{ old('transaction_type', $property->transaction_type ?? '') == 'sale' ? 'selected' : '' }}>Dijual</option>
                <option value="rent" {{ old('transaction_type', $property->transaction_type ?? '') == 'rent' ? 'selected' : '' }}>Disewakan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $property->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $property->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" step="any" name="price" class="form-control" value="{{ old('price', $property->price ?? '') }}" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="negotiable" class="form-check-input" id="negotiable"
                {{ old('negotiable', $property->negotiable ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="negotiable">Bisa Nego</label>
        </div>

        <div class="mb-3">
            <label>Luas Tanah (m²)</label>
            <input type="number" step="any" name="land_area" class="form-control" value="{{ old('land_area', $property->land_area ?? '') }}" required>
        </div>

        <div id="conditional-fields">
            <div class="mb-3">
                <label>Luas Bangunan (m²)</label>
                <input type="number" step="any" name="building_area" class="form-control" value="{{ old('building_area', $property->building_area ?? '') }}">
            </div>

            <div class="mb-3">
                <label>Kamar Tidur</label>
                <input type="number" name="bedrooms" class="form-control" value="{{ old('bedrooms', $property->bedrooms ?? '') }}">
            </div>

            <div class="mb-3">
                <label>Kamar Mandi</label>
                <input type="number" name="bathrooms" class="form-control" value="{{ old('bathrooms', $property->bathrooms ?? '') }}">
            </div>

            <div class="mb-3">
                <label>Jumlah Lantai</label>
                <input type="number" name="floors" class="form-control" value="{{ old('floors', $property->floors ?? '') }}">
            </div>
        </div>

    </div>

    <div class="col-md-6">

        <div class="mb-3">
            <label>Jenis Sertifikat</label>
            <input type="text" name="certificate_type" class="form-control" value="{{ old('certificate_type', $property->certificate_type ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Daya Listrik</label>
            <input type="text" name="electricity" class="form-control" value="{{ old('electricity', $property->electricity ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Kondisi Interior</label>
            <select name="interior_condition" class="form-control">
                <option value="">Pilih Kondisi</option>
                <option value="empty" {{ old('interior_condition', $property->interior_condition ?? '') == 'empty' ? 'selected' : '' }}>Kosong</option>
                <option value="semi_furnished" {{ old('interior_condition', $property->interior_condition ?? '') == 'semi_furnished' ? 'selected' : '' }}>Semi Furnished</option>
                <option value="furnished" {{ old('interior_condition', $property->interior_condition ?? '') == 'furnished' ? 'selected' : '' }}>Full Furnished</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Arah Hadap</label>
            <input type="text" name="facing" class="form-control" value="{{ old('facing', $property->facing ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Garasi (jumlah mobil)</label>
            <input type="number" name="garage" class="form-control" value="{{ old('garage', $property->garage ?? '0') }}">
        </div>

        <div class="mb-3">
            <label>Carport (jumlah mobil)</label>
            <input type="number" name="carport" class="form-control" value="{{ old('carport', $property->carport ?? '0') }}">
        </div>

        <div class="mb-3">
            <label>Kondisi Properti</label>
            <select name="condition" class="form-control">
                <option value="">Pilih Kondisi</option>
                <option value="new" {{ old('condition', $property->condition ?? '') == 'new' ? 'selected' : '' }}>Baru</option>
                <option value="used" {{ old('condition', $property->condition ?? '') == 'used' ? 'selected' : '' }}>Bekas</option>
                <option value="renovated" {{ old('condition', $property->condition ?? '') == 'renovated' ? 'selected' : '' }}>Renovasi</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="address" class="form-control">{{ old('address', $property->address ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Kota</label>
            <input type="text" name="city" class="form-control" value="{{ old('city', $property->city ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Provinsi</label>
            <input type="text" name="province" class="form-control" value="{{ old('province', $property->province ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Kode Pos</label>
            <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code', $property->postal_code ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Latitude</label>
            <input type="text" name="latitude" class="form-control" value="{{ old('latitude', $property->latitude ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Longitude</label>
            <input type="text" name="longitude" class="form-control" value="{{ old('longitude', $property->longitude ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Link Video YouTube</label>
            <input type="url" name="youtube_video_link" class="form-control" value="{{ old('youtube_video_link', $property->youtube_video_link ?? '') }}">
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="draft" {{ old('status', $property->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="active" {{ old('status', $property->status ?? '') == 'active' ? 'selected' : '' }}>Aktif</option>
                <option value="sold" {{ old('status', $property->status ?? '') == 'sold' ? 'selected' : '' }}>Terjual</option>
                <option value="rented" {{ old('status', $property->status ?? '') == 'rented' ? 'selected' : '' }}>Disewa</option>
                <option value="pending" {{ old('status', $property->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
            </select>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="featured" class="form-check-input" id="featured"
                {{ old('featured', $property->featured ?? false) ? 'checked' : '' }}>
            <label class="form-check-label" for="featured">Properti Unggulan</label>
        </div>

        <div class="mb-3">
            <label>Gambar Properti</label>
            <input type="file" name="images[]" class="form-control" multiple accept="image/*">
        </div>

        @if(isset($property) && $property->images)
            <div class="mb-3">
                <label>Gambar Saat Ini</label><br>
                @foreach(json_decode($property->images) as $img)
                    <img src="{{ asset('storage/'.$img) }}" width="100" class="img-thumbnail me-2">
                @endforeach
            </div>
        @endif

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const propertyType = document.getElementById('property_type');
    const conditionalFields = document.getElementById('conditional-fields');
    const buildingInputs = conditionalFields.querySelectorAll('input, select');
    const landAreaInput = document.querySelector('input[name="land_area"]');

    function toggleFields() {
        const isLand = propertyType.value === 'land';
        
        // Toggle display dan state untuk field bangunan
        conditionalFields.style.display = isLand ? 'none' : 'block';
        
        buildingInputs.forEach(input => {
            if (isLand) {
                input.removeAttribute('required');
                input.setAttribute('disabled', 'disabled');
                input.value = ''; // Reset nilai
            } else {
                input.removeAttribute('disabled');
                // Set required hanya untuk field yang memang wajib
                if (input.name === 'building_area' || 
                    input.name === 'bedrooms' || 
                    input.name === 'bathrooms' || 
                    input.name === 'floors') {
                    input.setAttribute('required', 'required');
                }
            }
        });

        // Toggle required untuk land_area
        if (isLand) {
            landAreaInput.setAttribute('required', 'required');
        } else {
            landAreaInput.removeAttribute('required');
        }
    }

    // Tambahkan event listener
    propertyType.addEventListener('change', toggleFields);

    // Jalankan saat halaman dimuat
    toggleFields();
});
</script>

<script>
document.querySelector('form').addEventListener('submit', function(e) {
    const propertyType = document.getElementById('property_type');
    const conditionalFields = document.getElementById('conditional-fields');
    
    if (propertyType.value === 'land') {
        // Re-enable field yang disabled agar bisa disubmit
        conditionalFields.querySelectorAll('input[disabled], select[disabled]').forEach(input => {
            input.removeAttribute('disabled');
            input.value = ''; // Pastikan nilainya kosong
        });
    }
});
</script>
