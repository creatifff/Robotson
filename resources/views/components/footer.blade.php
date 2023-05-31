<footer id="contacts" class="footer">
    <div class="container__main">
        <div class="footer__grid-one">
            <div class="company__aside">
                <div class="company__block">
                    <a href="/">
                        <div class="logo">
                            <h1>Robotson</h1>
                        </div>
                    </a>
                    <p class="connect__text">Присоединяйтесь!</p>
                    <div class="footer__social">
                        <a href="#" class="footer__link">
                            <i class="fa-brands fa-vk"></i>
                        </a>
                        <a href="#" class="footer__link">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="footer__link">
                            <i class="fa-brands fa-telegram"></i>
                        </a>
                        <a href="#" class="footer__link">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>
                </div>
                <p class="about__company">
                    Robotson® необходимы ваши контактные данные, чтобы связаться с
                    вами по поводу наших продуктов и услуг. Вы можете отказаться от
                    подписки в любое время. Для получения информации о том, как
                    отказаться от подписки, а также о наших методах обеспечения
                    конфиденциальности и обязательствах по защите вашей личности,
                    ознакомьтесь с нашей <span>Политикой конфиденциальности.</span>
                </p>
            </div>
            <div class="form__aside">
                <div class="form__header">
                    <div class="form__title">Подпишитесь на рассылку, чтобы не пропустить акции, события и последние
                        новости
                    </div>
                </div>

                <form method="POST" class="footer__form" name="callback">
                    <div class="form-floating">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Ваш e-mail</label>
                    </div>
                    <button class="form__btn" type="submit" name="callback">
                        Подписаться
                    </button>
                </form>

            </div>
        </div>
        <hr class="footer__line"/>
        <div class="footer__nav">
            <nav>
                <a href="/" class="footer__link">Главная</a>
                <a href="{{ route('page.catalog') }}" class="footer__link">Каталог</a>
                <a href="#" class="footer__link">Услуги</a>
                <a href="#" class="footer__link">Контакты</a>
                <a href="#" class="footer__link">О компании</a>
            </nav>
            <div class="contacts">
                <div>
                    <span>Телефон: </span> <a href="tel:89274156060" class="footer__link">+7 927 415 60-60</a>
                </div>
                <div>
                    <span>Почта: </span> <a href="mailto:nazyrov_roman@mail.ru" target="_blank" class="footer__link">nazyrov_roman@mail.ru</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright__footer">
    <div class="container">
        <p>© 2023 Robotson. Все права защищены.</p>
    </div>
</div>
