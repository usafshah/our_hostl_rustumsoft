<form method="post" action="" enctype="multipart/form-data" class="form-horizontal form-label-left" novalidate>

                     

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Your Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="name1" placeholder="Full Name " required="required" type="text">
                        </div>
                        </div>
                         <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Contect No: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="phone" required="required" data-validate-minmax="1,50" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                   
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="address" name="address" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                       
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                     
                        
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div align="center">
                          
                          <button id="send" type="submit" name="register2" class="btn btn-success">Register</button>
                          <button type="button" onclick="go()" class="btn btn-primary">Cancel</button>
                        </div>
                      </div>
                    </form>