<template>
    <div class="table-responsive">
        <table class="table" style="table-layout: fixed">
            <tr>
                <th>Наименование отхода</th>
                <th width="200px">Код отхода по ФККО*</th>
                <th>Нормативно-техническая документация</th>
                <th width="120px">Количество тонн</th>
                <th>Вид деятельности</th>
                <td width="40px"></td>
            </tr>
            <tr v-for="(item, i) in services" :key="i">
                <td><input v-model="item['name']" type="text" :name="'services[' + i + '][name]'" class="form-control form-control-sm"></td>
                <td><dropdown :selected="item['code']" url="/admin/codes/search" :name="'services[' + i + '][code_id]'"></dropdown></td>
                <td><input v-model="item['doc']" type="text" :name="'services[' + i + '][doc]'" class="form-control form-control-sm"></td>
                <td><input v-model="item['size']" type="number" :name="'services[' + i + '][size]'" class="form-control form-control-sm"></td>
                <td><input v-model="item['type']" type="text" :name="'services[' + i + '][type]'" class="form-control form-control-sm"></td>
                <td><button class="btn btn-sm btn-warning" type="button" @click="services.splice(i, 1)"><i class="fa fa-minus"></i></button></td>
            </tr>
            <tr>
                <td colspan="6"><button type="button" class="btn btn-sm btn-outline-secondary" @click="addService"><i class="fa fa-plus"></i></button></td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    props: ['items'],
    data(){
        return {
            service: {},
            services: []
        }
    },
    created(){
        if(this.items != undefined)
        this.services = this.items
    },
    methods: {
        addService(){
            this.services.push({
                name: '',
                size: 0,
                code_id: 0,
                doc: 'Паспорт отхода',
                type: 'Прием на утилизацию'
            })
        }
    }
}
</script>