<footer id="footer">
    <div class="ft-content">
        <div class="ft-content-overlay"></div>
        <div class="wrapper-articles">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="ft-contact">
                            <h3>Trung tâm du học Vitrico</h3>
                            <div class="ft-contact-address">
                                Tầng 8, tòa nhà Callary, 123 Lý Chính Thắng, Phường 7, Quận 3, TP. HCM. <br>Số 32, ngách 376/12 đường Bưởi, P. Vĩnh Phúc, Q. Ba Đình, Hà Nội
                            </div>
                            <div class="ft-contact-tel">
                                <a href="tel:02477771990">02477771990</a>
                            </div>
                            <div class="ft-contact-email">
                                <a href="mailto:info@duhocsunny.edu.vn">info@duhocsunny.edu.vn</a>
                            </div>
                        </div>
                        <div class="ft-social-network medium--hide small--hide">
                            <a href="https://www.facebook.com/duhocsunny/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="https://www.youtube.com/channel/UCfJg86e2aefpNf2mNiz8dVw" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                            <a href="https://instagram.com/duhochanquoc.sunny" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <div class="ft-nav">
                            <h3>Liên kết nhanh</h3>
                            <ul class="no-bullets">
                                <li>
                                    <a href="{{'/'}}">Trang chủ</a>
                                </li> <li>
                                    <a href="{{'all-university'}}">Trường Đại Học</a>
                                </li>
                                @foreach($categories as $cate)
                                    <li class="">
                                        <a href="#">{{$cate->name}}</a>
                                    </li>
                                @endforeach

                                <li>
                                    <a href="/pages/tu-van-cung-sunny">Liên Hệ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="ft-subscribe">
                            <h3>Đăng ký nhận tin</h3>
                            <div class="ft-sub-desc">
                                Hãy nhập địa chỉ email của bạn vào ô dưới đây để có thể nhận được tất cả các tin tức mới nhất của Vitrico về các kì thi, hoạt động và sự kiện du học Hàn Quốc các bạn nhé!
                            </div>
                            <div class="ft-sub-wrapper">
                                <form accept-charset="UTF-8" action="/account/contact" class="contact-form" method="post">
                                    <input name="form_type" type="hidden" value="customer">
                                    <input name="utf8" type="hidden" value="✓">
                                    <div class="input-group">
                                        <input type="email" value="" placeholder="Nhập email của bạn..." name="contact[email]" id="Email" class="input-group-field" aria-label="email@example.com">
                                        <input type="hidden" name="contact[tags]" value="newsletter">
                                        <span class="input-group-btn">
                                                    <button type="submit" name="subscribe" id="subscribe" value="GỬI"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                                </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ft-copyrights-wrapper">
        <div class="wrapper-articles">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ft-copyrights text-center">
                            Copyrights © 2020 by <a target="_blank" href="{{'/'}}">Trung tâm du học Hàn Quốc Vitrico</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
