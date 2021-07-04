<template>
    <div>
        <pagination :data="leads" @pagination-change-page="getData"></pagination>
        <div class="table-tesponsive">
            <table class="table table-sm table-striped table-hover table-bordered">
                <tr>
                    <th>Имя</th>
                    <th>Клиент</th>
                    <th>E-mail</th>
                    <th>Телефон</th>
                    <th>Действия</th>
                </tr>
                <tr v-for="item in leads.data" :key="item.id" @click="showLead(item)">
                    <td>{{item.name}}</td>
                    <td><span v-if="item.client" class="badge badge-info text-white">{{item.client.name || item.client.email}}</span> </td>
                    <td>{{item.email}}</td>
                    <td>{{item.phone}}</td>
                    <td>
                        <button v-if="!item.client" @click.stop.prevent="createClient(item)" class="btn btn-sm btn-info" data-toggle="tooltip" data-title="Создать клиента"><i class="fa fa-plus"></i></button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="modal fade" id="lead" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Заявка #{{lead.id}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            leads: {},
            lead: {},
            lead: {}
        }
    },
    async created(){
        await this.getData();
    },
    methods: {
        async showLead(lead){
            const {data} = await axios.get('/admin/leads/' + lead.id)
            this.lead = data
            $('#lead').modal('show');
        },
        async createClient(lead){
            if(lead.client_id) return false
            try{
                const {data} = await axios.post('/admin/leads/' + lead.id + '/client')
                const leads = this.leads.data.map( l => {
                    if(lead.email == l.email) {
                        l.client = data
                        l.client_id = data.id
                    }
                    return l
                })
                console.log(leads);
                this.$set(this.leads, 'data', leads)
                this.$toast.success('Клиент успешно создан')
            }catch(error){
                console.log(error)
            }

        },
        async getData(page = 1){
            const {data} = await axios.get('/admin/leads/getData?page=' + page)
            this.leads = data
        }
    }
}
</script>