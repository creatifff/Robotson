<form class="request-form" action="{{ route('request.leaveRequest') }}" method="post">
    @csrf
    <div class="form-request-block">
        <div class="form__input-column">
            <label for="name">Ваше имя</label>
            <input type="text" class="form__input is-invalid" id="name" name="name">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form__input-column">
            <label for="phone_number">Номер телефона</label>
            <input type="text" class="form__input is-invalid" id="phone_number" name="phone_number">
            @error('phone_number')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <label>
            <select class="form__input" name="service">
                <option disabled selected>Выберите услугу</option>
                <option value="Роботы 'под ключ'">Роботы "под ключ"</option>
                <option value="Цифровизация">Цифровизация</option>
                <option value="Лазерное 3D-сканирование">Лазерное 3D-сканирование</option>
                <option value="Разработка ПО">Разработка ПО</option>
            </select>
        </label>
        @error('service')
        <div class="invalid-feedback-select">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-request-block">
        <div class="form__input-column">
            <label for="question">Ваш вопрос (необязательно)</label>
            <textarea class="form__textarea" id="question" rows="4" name="question"></textarea>
        </div>
        <button type="submit" class="form__btn">Отправить</button>
    </div>
</form>
