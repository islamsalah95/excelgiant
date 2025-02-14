<form wire:submit.prevent="submit" method="POST" enctype="multipart/form-data" id="contactForm">
    @csrf

    <div class="form-group">
        <label for="name" class="translatable reverse-text" data-ar="الاسم الثنائي" data-en="Full Name">الاسم
            الثنائي</label>
        <input type="text" wire:model="name" value="{{ old('name') ?: '' }}" id="name" name="name"
            placeholder="أكتب الأسم الثنائي" class="translatable reverse-text" data-ar-placeholder="أكتب الأسم الثنائي"
            data-en-placeholder="Enter your full name">
        @error('name')
            <div style="color: red; font-size: 0.875rem;">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="phone" class="translatable reverse-text" data-ar="رقم الجوال" data-en="Phone Number">رقم
            الجوال</label>
        <input type="number" id="phone" wire:model="phone" value="{{ old('phone') ?: '' }}"
            placeholder="أكتب رقم الجوال" class="translatable reverse-text" data-ar-placeholder="أكتب رقم الجوال"
            data-en-placeholder="Enter your phone number">
        @error('phone')
            <div style="color: red; font-size: 0.875rem;">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email" class="translatable reverse-text" data-ar="البريد" data-en="email Number">
            البريد</label>
        <input type="email" id="email" wire:model="email" value="{{ old('email') ?: '' }}"
            placeholder="أكتب  البريد" class="translatable reverse-text" data-ar-placeholder="أكتب البريد "
            data-en-placeholder="Enter your email number">
        @error('email')
            <div style="color: red; font-size: 0.875rem;">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group">
        <label for="company" class="translatable reverse-text" data-ar="اسم المنشأة" data-en="Company Name">اسم
            المنشأة</label>
        <input type="text" id="company" wire:model="company" value="{{ old('company') ?: '' }}"
            placeholder="أكتب أسم المنشأة" class="translatable reverse-text" data-ar-placeholder="أكتب أسم المنشأة"
            data-en-placeholder="Enter the company name">
        @error('company')
            <div style="color: red; font-size: 0.875rem;">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="position" class="translatable reverse-text" data-ar="الصفة في المنشأة"
            data-en="Position in the Company">الصفة في المنشأة</label>
        <input type="text" id="position" wire:model="position" value="{{ old('position') ?: '' }}"
            placeholder="أكتب الصفة في المنشأة" class="translatable reverse-text"
            data-ar-placeholder="أكتب الصفة في المنشأة" data-en-placeholder="Enter your position in the company">
        @error('position')
            <div style="color: red; font-size: 0.875rem;">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="city" class="translatable reverse-text" data-ar="المدينة" data-en="City">المدينة</label>
        <input type="text" id="city" wire:model="city" value="{{ old('city') ?: '' }}"
            placeholder="أكتب المدينة" class="translatable reverse-text" data-ar-placeholder="أكتب المدينة"
            data-en-placeholder="Enter the city">
        @error('city')
            <div style="color: red; font-size: 0.875rem;">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="message" class="translatable reverse-text" data-ar="المطلوب" data-en="Message">المطلوب</label>
        <textarea id="message" wire:model="message" value="{{ old('message') ?: '' }}" placeholder="أكتب المطلوب..."
            class="translatable reverse-text" data-ar-placeholder="أكتب المطلوب..."
            data-en-placeholder="Enter your message..."></textarea>
        @error('message')
            <div style="color: red; font-size: 0.875rem;">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="translatable reverse-text" data-ar="إرسال" data-en="Submit">إرسال</button>
</form>
