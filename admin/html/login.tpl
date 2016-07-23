
{include file='inc/login-header.tpl'}
<div class="container">

    <!-- Page Heading -->
    <div class="row">
       <div class="col-lg-6 col-lg-push-3">
            <h1 class="page-header">
                AwardsMart Admin <small>Login to your system</small>
            </h1>            
            {if $has_message}
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>  {$the_message}
                </div>
            {/if}            
        </div>        
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-6 col-lg-push-3">
            <form action="" method="POST">
            	<label>Your Username</label>
            	<input name="username" type="text" class="form-control" />
            	<label>Your Password</label>
            	<input name="password" type="password" class="form-control" />
            	<br /><br />
            	<input type="submit" value="Login" class="btn btn-success form-control" />
                <input type="hidden" value="1" name="trigger-login" />
            </form>
        </div>
    </div>
    <div class="row" style="height:400px;"></div>    

</div>
<!-- /.container-fluid -->
{include file='inc/footer.tpl'}


