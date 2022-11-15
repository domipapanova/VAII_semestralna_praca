<?php
/** @var Array $data */
?>
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="card-body p-md-5 mx-md-4">

                                <div class="text-center">
                                    <img src="./public/images/philodednron.png"
                                         style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Vitajte u nás, vaše PlantPlace</h4>
                                </div>
                                <form class="form-signin" method="post" action="<?= \App\Config\Configuration::LOGIN_URL ?>">
                                    <p>Prosím, prihláste sa do vášho účtu</p>
                                    <div class="text-center text-danger mb-3 "> <?= @$data['message'] ?></div>
                                    <div class="form-outline mb-4">
                                        <input name="login" type="text" id="login" class="form-control" placeholder="Login" required autofocus />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input name="password" type="password" id="password" class="form-control"
                                               placeholder="Password" required>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="submit">Prihlásiť sa</button>
                                        <a class="text-muted" href="#!">Zabudli ste heslo?</a>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Ešte nemáte svoj účet?</p>
                                        <a href="?c=signup"> <button type="button" class="btn btn-outline-danger">Vytvorte nový</button> </a>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                            <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                <h4 class="mb-4">Sme viac ako len e-shop</h4>
                                <p class="small mb-0">Do nášho obchodu poctivo vyberáme zdravé rastlinky rôznych tradičných aj zberateľských druhov. V našej širokej ponuke si teda prídu na svoje začiatočníci
                                    a aj skúsení pestovatelia a milovníci rastlín. K rastlinám neodkladne patria aj kvetináče. U nás si máte rozhodne z čoho vybrať. Máme rozsiahlu ponuku dizajnových črepníkov
                                    zo všetkých kútov sveta. Mnohé z nich sú ručne vyrábané a preto je každý kus jedinečný. Vyrábame tiež otvorené aj uzavreté rastlinné teráriá, známe tiež aj ako floráriá.
                                    V neposlednom rade u nás nájdete nenáročné riasogule špičkovej kvality.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>