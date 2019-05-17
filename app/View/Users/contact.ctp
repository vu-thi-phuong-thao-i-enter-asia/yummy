<!DOCTYPE html>
<html>
<head>
	<title>
        <?php
            echo $this->assign("title", "Contact");
        ?>
    </title>
</head>
<body>
<div class="row affix-row">
    <div class="col-md-2 col-sm-2 affix-sidebar">
        <?php
        echo $this->element('nav');
        ?>
    </div>
    <div class="col-md-9 col-sm-10 col-md-offset-1">
        <div class="row">
            <h1 class="h1">Contact us
                <br>
                <small>Thank you for contact.</small></h1>
        </div>


        <div class="row">
            <div class="well">
                <form>
                    <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>

                    <address>
                        <strong>Tribal Media House, Inc.</strong><br>
                        <span class="glyphicon glyphicon-home">&nbsp;</span>Address: 7F IPH, 241 Xuan Thuy Str., Cau Giay Dist., Hanoi, Vietnam.
                        <br>
                        <span class="glyphicon glyphicon-phone">&nbsp;</span>Phone: ＋84-(0)4-3256-5182<br>
                        <span class="glyphicon glyphicon-modal-window">&nbsp;</span>Website: <a href="http://www.tmh-techlab.vn/?lang=vn" target="_blank">www.tmh-techlab.vn</a><br>
                        <span class="glyphicon glyphicon-thumbs-up">&nbsp;</span>Facebook: <a href="https://www.facebook.com/tmhtechlab/" target="_blank">www.facebook.com/tmhtechlab</a>
                    </address>

                    <address>
                        <strong>Tribal Media House - Tech Lab</strong><br>
                        <a href="http://www.tmh-techlab.vn/" target="_blank">info@tmh-techlab.vn</a>
                    </address>

                </form>
            </div>
        </div>
        <!--    form mail-->
        <div class="row">
            <div class="well">
                <form action="" method="post">
                    <div class="form-row">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="first_name" placeholder="First name">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="last_name" placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
                        <label for="exampleFormControlTextarea1">Contents</label>
                        <textarea class="form-control" name="message" cols="30" rows="3"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Send </button>
                </form>
            </div>
        </div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1033.6419283986409!2d105.89336137267624!3d21.027723887885482!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a96a1ecd2e27%3A0x4c1877a3128a0829!2zMTg0IEPhu5UgTGluaCwgTMOgbmcgVHLhuqFtLCBwLiBMb25nIEJpw6puLCBMb25nIEJpw6puLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1523606338746" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>


</body>
</html>