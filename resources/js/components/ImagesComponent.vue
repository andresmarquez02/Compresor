<template>
    <div class="p-4 bg-white mt-7 rounded-3xl">
        <template v-if="status !== 'Subiendo...'">
            <div class="grid grid-cols-3 py-3 mb-2 bg-gray-200 rounded-3xl">
                <div class="self-center justify-self-center">
                    Imagen
                </div>
                <div class="self-center justify-self-center">
                    Nombre
                </div>
                <div class="self-center justify-self-center">
                    Descargar
                </div>
            </div>
            <div :key="i" v-for="(file,i) of files" >
                <div class="grid grid-cols-3 gap-3 mb-2">
                    <div class="self-center justify-self-center">
                        <img :src="file.path" class="w-14 h-14 md:h-16 md:w-16 xl:h-20 xl:w-20 rounded-lg" alt="" style="object-fit:cover" srcset="">
                    </div>
                    <div class="self-center justify-self-center">
                        {{ file.name }}
                    </div>
                    <div class="self-center justify-self-center">
                        <a :href="'download/'+file.name" target="_black" class="px-3 py-2.5 text-white transition duration-500 ease-in-out rounded-lg bg-gradient-to-r focus:shadow-xl focus:outline-none hover:shadow-lg bg-yellow-400 hover:bg-yellow-500">Descargar</a>
                    </div>
                </div>
            </div>
        </template>
        <template v-else>
            <div class="py-4 text-center">
                <h2 class="text-base font-bold text-gray-700 md:text-lg">{{status}}</h2>
            </div>
        </template>
    </div>
</template>
<script>
export default {
     props: ['files','status'],
}
</script>
