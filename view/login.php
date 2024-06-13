<div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row mb-5 bg-ligth p-5">
                        <!--Sistema XPTO - Login-->
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="usuario" type="email"
                                            placeholder="name@example.com" />
                                        <label for="inputEmail">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="senha" type="password"
                                            placeholder="Password" />
                                        <label for="inputPassword">Senha</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button onclick="doLogin()" type="button" class="btn btn-primary" id="btnLogin">Login</button>
                                    </div>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <label id="msg"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>