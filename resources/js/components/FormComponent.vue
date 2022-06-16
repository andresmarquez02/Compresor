<template>
    <div class="w-11/12 lg:w-7/12 md:w-9/12">
        <div class="p-4 bg-white rounded-3xl">
            <label for="file" class="flex items-center justify-center w-full h-24 cursor-pointer rounded-3xl" style="border: 5px #ffee00 dashed;">
                <h2 class="text-base font-bold text-gray-500 md:text-2xl">Click para selecciona archivo</h2>
                <input type="file" name="file" id="file" hidden @change="upload_file($event)">
            </label>
        </div>
        <images-component :files="files" :status="status"></images-component>
    </div>
</template>
<script>
export default {
    data (){
        return {
            status: '',
            files: [],
        }
    },
    methods: {
        async upload_file(event){
            this.status = "Subiendo...";
            try {
                let form = new FormData();
                form.append("file",event.target.files[0]);

                const consulting = await fetch("api/save",{
                    method: "POST",
                    body: form,
                    headers:{
                        "enctype": "multipart/form-data",
                        "Accept": "application/json"
                    }
                });

                if(consulting.status == 413){
                    alertify.error("La imagen excedio el peso permitido");
                }

                const response = await consulting.json();

                if(consulting.status == 200){

                    this.files.push(
                        {
                            "name": response.response.name,
                            "path": response.response.path,
                        }
                    );
                    this.status = "";
                    alertify.success("Imagen comprimida con exito :)");
                    return 0;
                }

                throw([response,consulting.status]);

            } catch (error) {
                this.status = "";
                if(error[1] == 422){
                    alertify.error(error[0].errors.file[0]);
                }
                if(error[1] == 500){
                    alertify.error(error[0].errors.error[0]);
                }
                if(error[1] == 404){
                    alertify.error("Error de conexion con el servidor...");
                }
                if(error[1] == 413){
                    alertify.error("La imagen excedio el peso permitido");
                }
            }
            document.querySelector("#file").value = "";
        }
    },
}
</script>
