<?php require_once __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/content.php'; ?>

    <div class="border m-3 p-5 bg-light form-content">

        <form method="POST" action="/save-order">

            <?php require_once __DIR__ . '/../../includes/alert-message.php'; ?>

            <h4 class="text-center mb-3"> Dados Basicos do Cliente </h4>

            <!-- Name & CPF / CNPJ -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Nome <span class="span-required">*</span></label>
                    <input type="text" class="form-control" name="first_name" id="inputName" placeholder="Nome">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputLastname">Sobrenome <span class="span-required">*</span></label>
                    <input type="text" class="form-control" name="last_name" id="inputLastname" placeholder="Sobrenome">
                </div>
                <div class="form-group col-md-3">
                    <label for="cpf_cnpj">CPF / CNPJ <span class="span-required">*</span></label>
                    <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" placeholder="XXX.XXX.XXX-XX">
                </div>
            </div>

            <!-- Contact -->
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputPhone">Telefone <span class="span-required">*</span></label>
                    <input type="text" class="form-control telefone" name="phone" id="inputPhone"
                           placeholder="(XX) XXXX-XXXX" onkeypress="$('.telefone').maskbrphone();">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPhone2">Telefone 2</label>
                    <input type="text" class="form-control telefone" name="phone_two" id="inputPhone2"
                           placeholder="(XX) XXXX-XXXX" onkeypress="$('.telefone').maskbrphone();">
                </div>
                <div class="form-group col-md-8">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="email@email.com">
                </div>
            </div>

            <!-- Address -->
            <div class="form-row">

                <div class="form-group col-sm-2">
                    <label for="cep">CEP <span class="span-required">*</span></label>
                    <input type="text" class="form-control" id="cep" name="cep"/>
                </div>

                <div class="form-group col-sm-4">
                    <label for="endereco">Endereço <span class="span-required">*</span></label>
                    <input type="text" class="form-control" id="endereco" name="endereco"/>
                </div>

                <div class="form-group col-sm-1">
                    <label for="numero">Número <span class="span-required">*</span></label>
                    <input type="number" class="form-control" id="numero" name="numero"/>
                </div>

                <div class="form-group col-sm-2">
                    <label for="complemento">Complemento <span class="span-required">*</span></label>
                    <input type="text" class="form-control" id="complemento" name="complemento"/>
                </div>

                <div class="form-group col-sm-2">
                    <label for="cidade">Cidade <span class="span-required">*</span></label>
                    <input type="text" class="form-control" id="cidade" name="cidade"/>
                </div>

                <div class="form-group col-sm-1">
                    <label for="uf">UF <span class="span-required">*</span></label>
                    <input type="text" class="form-control" id="uf" name="uf" maxlength="2">
                </div>

            </div>

            <hr>

            <!-- Motorcycle Section Form -->

            <h4 class="text-center m-4"> Dados Basicos da Moto </h4>

            <div class="form-row">
                <!-- License Plate -->
                <div class="form-group col-md-1">
                    <label for="licensePlate">Emplacamento<span class="span-required">*</span> </label>
                    <input type="text" class="form-control" id="licensePlate" name="licensePlate" placeholder="XXX-1234">
                </div>
                <!-- Motorcycle Brand -->
                <div class="form-group col-md-3">
                    <label for="brandMotorcycle"> Marca <span class="span-required">*</span></label>
                    <input type="text" class="form-control" name="brandMotorcycle" id="brandMotorcycle"
                           placeholder="Exemplo: Kawasaki">
                </div>
                <!-- Model -->
                <div class="form-group col-md-4">
                    <label for="modelMotorcycle"> Modelo <span class="span-required">*</span></label>
                    <input type="text" class="form-control" id="modelMotorcycle" name="modelMotorcycle"
                           placeholder="Exemplo: CBR 600.">
                </div>
                <!-- KM Motorcycle -->
                <div class="form-group col-md-2">
                    <label for="kmMotorcycle"> Quilometro <span class="span-required">*</span></label>
                    <input type="number" class="form-control" id="kmMotorcycle" placeholder="Exemplo: 65.000 KM"
                           name="kmMotorcycle">
                </div>
                <!-- Engine -->
                <div class="form-group col-md-2">
                    <label for="engineMotorcycle"> Cilindrada <span class="span-required">*</span> </label>
                    <input type="text" class="form-control" id="engineMotorcycle" name="engineMotorcycle"
                           placeholder="Exemplo: 650CC." maxlength="4">
                </div>
            </div>

            <!-- Year Motorcycle -->
            <div class="form-row d-flex justify-content-center ">

                <div class="form-group col-md-3">
                    <label for="yearRegister"> Ano Fabricação<span class="span-required">*</span></label>
                    <input type="text" class="form-control" id="yearRegister" name="yearMotorcycle"
                           placeholder="Ano de Fabricação" maxlength="4">
                </div>

                <div class="form-group col-md-3">
                    <label for="yearRegister"> Ano do Modelo <span class="span-required">*</span></label>
                    <input type="text" class="form-control" id="yearRegister" name="yearMotorcycle"
                           placeholder="Ano do modelo" maxlength="4">
                </div>
            </div>

            <!-- Problems Motorcycle -->
            <div class="form-group">
                <label for="problemsMotorycle"> Problemas informados pelo cliente </label>
                <textarea class="form-control" id="problemsMotorycle"
                          placeholder="Exemplo: Barulho no motor, problema no cambio, etc."
                          rows="3"></textarea>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="descriptionMotorycle"> Observações da moto </label>
                <textarea class="form-control" id="descriptionMotorycle"
                          placeholder="Exemplo: Moto chegou a oficina com carenagem esquerda riscada, roda dianteira amassada, etc."
                          rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-default w-100">Registrar Ordem de serviço</button>

        </form>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script><?php require_once __DIR__ . '/../../../public/assets/js/cep&CpfVerify.js'; ?></script>
    <script><?php require_once __DIR__ . '/../../../public/assets/js/inputPhoneModel.js'; ?></script>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>