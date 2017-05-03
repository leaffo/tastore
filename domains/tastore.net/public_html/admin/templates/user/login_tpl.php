<section class="content login-page">

  <div class="login-page-container">

    <div class="boxed animated flipInY">
      <div class="inner">
        <form action="index.php?com=user&act=login" method="post" class="nhaplieu" id="login">
          <div class="login-title text-center">
            <h4>ĐĂNG NHẬP ADMINISTRATOR</h4>
            
          </div>

          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <input type="text" name="username" id='username' class="form-control" placeholder="Username" required />
          </div>

          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" name="password" id='password' class="form-control" placeholder="Password" required />
          </div>

          <input type="submit" class="btn btn-lg btn-success" value="Đăng nhập vào quản trị" name="submit" id="submit" />

          <p class="footer" style="margin-bottom:0px;">Vui lòng nhập Username và Password.</p>
          <p class="footer"><i class="fa fa-volume-up"></i> kính chào quý khách!</p>
                          
        </form>
      </div>
    </div>

  </div>

</section>
