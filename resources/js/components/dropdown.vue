<template>
    <div>
        <label v-if="title">{{title}}</label>
        <div class="dropdown" v-if="multiple || !selectedItem">
            <span data-toggle="dropdown" class="btn btn-sm btn-outline-secondary btn-block text-left">Выберите из списка</span>
            <div class="dropdown-menu w-100 pt-0">
                <input type="text" class="form-control form-control-sm border-none" placeholder="Поиск" v-model="q" autofocus>
                <div style="max-height: 200px; overflow: auto;">
                    <a href="#" class="dropdown-item text-truncate" v-for="(item, i) in items" :key="i" @click.prevent="select(item)">
                        {{item[options.label]}}
                    </a>
                </div>
            </div>
        </div>
        <div style="max-height: 100px; overflow: auto;">
            <div v-if="multiple">
                <div class="input-group input-group-sm" v-for="(item, i) in selectedItems" :key="i">
                    <input type="hidden" :name="name" :value="item[options.value]">
                    <input type="text" disabled class="form-control form-control-sm text-truncate" :value="item[options.label]">
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-danger" @click="del(item)"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            </div>
            <div v-else>
                <input type="hidden" :name="name" :value="selectedItem ? selectedItem[options.value] : selectedItem">
                <div class="input-group input-group-sm" v-if="selectedItem">
                    <input type="text" disabled class="form-control form-control-sm text-truncate" :value="selectedItem[options.label]">
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-danger" @click="del(selectedItem)"><i class="fa fa-trash"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['url', 'name', 'title', 'selected', 'multiple', 'label', 'value', 'preload'],
    data(){
        return {
            q: '',
            items: [],
            selectedItems: [],
            selectedItem: false,
            changed: false,
            options: {}
        }
    },
    async created(){
        const obj = {}
        if(this.multiple != undefined) obj.multiple = true
        if(this.title != undefined) obj.title = this.title
        if(this.label != undefined) obj.label = this.label
        if(this.value != undefined) obj.value = this.value
        if(this.preload != undefined){
            this.changed = true
            await this.loadItems()
        }
        this.options = Object.assign({
            multiple: false,
            title: 'Список',
            label: 'name',
            value: 'id'
        }, obj)
        if(this.multiple) this.selectedItems = this.selected ? this.selected : []
        else this.selectedItem = this.selected
        setInterval( await this.loadItems, 1000)
    },
    watch: {
        q: function(n){
            this.changed = true
        },
    },
    methods: {
        async loadItems(){
            if(this.changed && (this.q || this.preload)){
                const {data} = await axios.get(this.url + '?q=' + this.q)
                this.items = data;
                this.changed = false
            }
        },
        select(item){
            if(this.multiple){
                const index = this.selectedItems.findIndex( el => item.id == el.id)
                if(index < 0){
                    this.selectedItems.push(item)
                }
            }else{
                this.selectedItem = item
            }
        },
        del(item){
            if(this.multiple){
                const index = this.selectedItems.findIndex( el => item.id == el.id)
                this.selectedItems.splice(index, 1)
            }else{
                this.selectedItem = null
            }
        }
    }

}
</script>
