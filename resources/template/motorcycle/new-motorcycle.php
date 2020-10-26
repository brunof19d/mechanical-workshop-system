<?php require_once __DIR__ . '/../../includes/header.php'; require __DIR__ . '/../../includes/content.php'; ?>

    <div class="border m-3 p-5 bg-light form-content">
        <form method="POST">
            <h4 class="text-center m-4"> Dados da Motocicleta </h4>

            <div class="form-row">

                <!-- License Plate -->
                <div class="form-group col-md-1">
                    <label for="licensePlate">Emplacamento<span class="span-required">*</span> </label>
                    <input type="text" class="form-control" id="licensePlate" name="licensePlate"
                           placeholder="XXX-1234">
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

            <button type="submit" class="btn btn-default w-100 mt-3">Registrar Motocicleta</button>

        </form>
    </div>

<?php require_once __DIR__ . '/../../includes/footer.php'; ?>