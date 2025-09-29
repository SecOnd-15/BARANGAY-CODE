@extends('layouts.resident_panel')

@section('title', 'Make Reservation')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Make New Reservation</h2>
        <p class="text-gray-600 mt-2">Fill out the form below to create a new facility reservation</p>
    </div>

    <form action="#" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf
        
        <!-- Facility Selection -->
        <div>
            <label for="facility" class="block text-sm font-medium text-gray-700 mb-2">Select Facility</label>
            <select id="facility" name="facility" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                <option value="">Choose a facility...</option>
                <option value="study_desk">Study Desk</option>
                <option value="computer_desk">Computer Desk</option>
                <option value="meeting_room">Meeting Room</option>
            </select>
        </div>

        <!-- Date Selection -->
        <div>
            <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Reservation Date</label>
            <input type="date" id="date" name="date" min="{{ date('Y-m-d') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
        </div>

        <!-- Time Selection -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="start_time" class="block text-sm font-medium text-gray-700 mb-2">Start Time</label>
                <select id="start_time" name="start_time" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    <option value="">Select start time...</option>
                    @php
                        for($hour = 8; $hour <= 20; $hour++) {
                            for($minute = 0; $minute < 60; $minute += 30) {
                                $time = sprintf('%02d:%02d', $hour, $minute);
                                $display_time = date('g:i A', strtotime($time));
                                echo "<option value='$time'>$display_time</option>";
                            }
                        }
                    @endphp
                </select>
            </div>
            
            <div>
                <label for="end_time" class="block text-sm font-medium text-gray-700 mb-2">End Time</label>
                <select id="end_time" name="end_time" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    <option value="">Select end time...</option>
                    @php
                        for($hour = 8; $hour <= 21; $hour++) {
                            for($minute = 0; $minute < 60; $minute += 30) {
                                $time = sprintf('%02d:%02d', $hour, $minute);
                                $display_time = date('g:i A', strtotime($time));
                                echo "<option value='$time'>$display_time</option>";
                            }
                        }
                    @endphp
                </select>
            </div>
        </div>

        <!-- Purpose -->
        <div>
            <label for="purpose" class="block text-sm font-medium text-gray-700 mb-2">Purpose of Reservation</label>
            <textarea id="purpose" name="purpose" rows="4" placeholder="Please describe the purpose of your reservation..." class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"></textarea>
        </div>

        <!-- Number of Participants -->
        <div>
            <label for="participants" class="block text-sm font-medium text-gray-700 mb-2">Number of Participants</label>
            <input type="number" id="participants" name="participants" min="1" max="10" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent" placeholder="Enter number of participants">
            <p class="text-sm text-gray-500 mt-1">Maximum 10 participants allowed</p>
        </div>

        <!-- Resident ID Picture Upload -->
        <div>
            <label for="resident_id_picture" class="block text-sm font-medium text-gray-700 mb-2">
                Upload Resident ID Picture
            </label>
            <div class="flex items-center justify-center w-full">
                <label for="resident_id_picture" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-200">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl mb-2"></i>
                        <p class="mb-2 text-sm text-gray-500">
                            <span class="font-semibold">Click to upload</span> or drag and drop
                        </p>
                        <p class="text-xs text-gray-500">PNG, JPG, JPEG (Max: 5MB)</p>
                    </div>
                    <input id="resident_id_picture" name="resident_id_picture" type="file" class="hidden" accept=".png,.jpg,.jpeg" />
                </label>
            </div>
            <div id="file-name" class="text-sm text-green-600 mt-2 hidden"></div>
        </div>

        <!-- Additional Requirements -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Additional Requirements</label>
            <div class="space-y-2">
                <label class="flex items-center">
                    <input type="checkbox" name="requirements[]" value="extension_cord" class="rounded border-gray-300 text-yellow-600 focus:ring-yellow-500">
                    <span class="ml-2 text-gray-700">Extension Cord</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="requirements[]" value="extra_monitor" class="rounded border-gray-300 text-yellow-600 focus:ring-yellow-500">
                    <span class="ml-2 text-gray-700">Extra Monitor (Computer Desk only)</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="requirements[]" value="reading_lamp" class="rounded border-gray-300 text-yellow-600 focus:ring-yellow-500">
                    <span class="ml-2 text-gray-700">Reading Lamp</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="requirements[]" value="whiteboard" class="rounded border-gray-300 text-yellow-600 focus:ring-yellow-500">
                    <span class="ml-2 text-gray-700">Whiteboard</span>
                </label>
            </div>
        </div>

        <!-- Terms and Conditions -->
        <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-200">
            <label class="flex items-start">
                <input type="checkbox" name="terms" class="mt-1 rounded border-gray-300 text-yellow-600 focus:ring-yellow-500">
                <span class="ml-2 text-sm text-gray-700">
                    I agree to the <a href="#" class="text-yellow-600 hover:text-yellow-700 underline">terms and conditions</a> of facility reservation. 
                    I understand that any damage to the facility will be my responsibility and that reservations may be subject to approval.
                </span>
            </label>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-4 pt-4">
            <a href="{{ route('resident.dashboard') }}" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition duration-200 font-semibold">
                Cancel
            </a>
            <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-200 font-semibold">
                Submit Reservation
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('date').min = today;

    // Time validation
    const startTimeSelect = document.getElementById('start_time');
    const endTimeSelect = document.getElementById('end_time');

    startTimeSelect.addEventListener('change', function() {
        const startTime = this.value;
        if (startTime) {
            // Enable only end times after start time
            Array.from(endTimeSelect.options).forEach(option => {
                if (option.value && option.value <= startTime) {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            });
        }
    });

    // File upload display
    const fileInput = document.getElementById('resident_id_picture');
    const fileNameDisplay = document.getElementById('file-name');

    fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const fileName = this.files[0].name;
            fileNameDisplay.textContent = `Selected file: ${fileName}`;
            fileNameDisplay.classList.remove('hidden');
            
            // File size validation (5MB)
            const fileSize = this.files[0].size;
            const maxSize = 5 * 1024 * 1024; // 5MB in bytes
            
            if (fileSize > maxSize) {
                alert('File size exceeds 5MB limit. Please choose a smaller file.');
                this.value = '';
                fileNameDisplay.classList.add('hidden');
            }
        } else {
            fileNameDisplay.classList.add('hidden');
        }
    });
});
</script>

<style>
select:invalid {
    color: #6b7280;
}
select option {
    color: #1f2937;
}
</style>
@endsection