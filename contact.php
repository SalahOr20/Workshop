<form action="mailer.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="nom" class="form-control" placeholder="Votre nom" >
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Votre email" >
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="sujet" placeholder="Sujet" >
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" ></textarea>
       
                  <button name="submit" type="submit">Envoyer</button>
               </div>
            </form>
