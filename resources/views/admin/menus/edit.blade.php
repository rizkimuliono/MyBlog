@extends('layouts.admin_layout')

@section('title', 'Edit Menu')

@section('content')

        <h1>{{ isset($menu) ? 'Edit Menu' : 'Create Menu' }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ isset($menu) ? route('menus.update', $menu->id) : route('menus.store') }}">
            @csrf
            @if (isset($menu))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', isset($menu) ? $menu->name : '') }}" required>
            </div>
            <div class="form-group">
                <label for="link_type">Link Type:</label>
                <select name="link_type" class="form-control" id="link_type" required>
                    <option value="custom" {{ old('link_type', isset($menu) && $menu->link_type == 'custom' ? 'selected' : '') }}>Custom</option>
                    <option value="post" {{ old('link_type', isset($menu) && $menu->link_type == 'post' ? 'selected' : '') }}>Post</option>
                    <option value="category" {{ old('link_type', isset($menu) && $menu->link_type == 'category' ? 'selected' : '') }}>Category</option>
                </select>
            </div>
            <div class="form-group" id="url_input">
                <label for="url">URL:</label>
                <input type="text" name="link" class="form-control" value="{{ old('link', isset($menu) ? $menu->link : '') }}">
            </div>
            <div class="form-group" id="link_id_input" style="display: none;">
                <label for="link_id">Link ID:</label>
                <select name="link_id" class="form-control">
                    <!-- Options will be added dynamically by JavaScript -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($menu) ? 'Update' : 'Create' }}</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function toggleLinkFields() {
                var linkType = document.getElementById('link_type').value;
                var urlInput = document.getElementById('url_input');
                var linkIdInput = document.getElementById('link_id_input');

                if (linkType === 'custom') {
                    urlInput.style.display = 'block';
                    linkIdInput.style.display = 'none';
                } else {
                    urlInput.style.display = 'none';
                    linkIdInput.style.display = 'block';

                    var linkIdSelect = linkIdInput.querySelector('select');
                    linkIdSelect.innerHTML = ''; // Clear previous options

                    if (linkType === 'post') {
                        @foreach($posts as $post)
                            var option = document.createElement('option');
                            option.value = {{ $post->id }};
                            option.textContent = "{{ $post->title }}";
                            linkIdSelect.appendChild(option);
                        @endforeach
                    } else if (linkType === 'category') {
                        @foreach($categories as $category)
                            var option = document.createElement('option');
                            option.value = {{ $category->id }};
                            option.textContent = "{{ $category->name }}";
                            linkIdSelect.appendChild(option);
                        @endforeach
                    }

                    // Set selected option
                    var selectedLinkId = '{{ old('link_id', isset($menu) ? $menu->link_id : '') }}';
                    if (selectedLinkId) {
                        linkIdSelect.value = selectedLinkId;
                    }
                }
            }

            document.getElementById('link_type').addEventListener('change', toggleLinkFields);
            toggleLinkFields(); // Initial call to set the correct display and selected option
        });
    </script>
@endsection
