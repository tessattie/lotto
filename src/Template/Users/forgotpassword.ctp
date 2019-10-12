 <div class="row">
   <div class="col-md-4 col-md-offset-4">
     <section class="login_content" style="background:#F2F2F2;border:1px solid #ddd;border-radius:3px;padding:10px 20px 30px">
        <?= $this->Form->create() ?>
          <h3>Forgot Password</h3>
          <p style="padding:10px 0px">Enter your email address in order to receive your new account information :</p>
          <div>
          <?= $this->Form->input("email", array('label' => false, "class" => "form-control loginForm", "placeholder" => "Email")) ?>
          </div>
          <div>
          <?= $this->Flash->render() ?>
            <?= $this->Form->button("Submit", array('class' => "btn btn-success loginForm")) ?>
          </div>
        <?= $this->Form->end() ?>
        <div>
        	<?php if(!empty($confirmation)) : ?>
        		<p class="bg-success" style="margin-top:15px;">Please check your email and <a href="<?= ROOT_DIREC ?>/users/login"> log in</a> with the new account information we provided.</p>
        	<?php else : ?>
        	<?php endif; ?>
        </div>
      </section>
   </div>
 </div>