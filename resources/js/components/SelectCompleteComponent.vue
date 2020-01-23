<template>
<div>
    <div  v-if="kinds" class="form-group m-0">
        <label class="m-0">Nome:</label>
        <input :value="pname" name="name" :readonly="true" class="form-control form-control-sm">
    </div>
    <div class="form-group m-0">
        <label class="m-0">Selecione Área Jurídica:</label>
        <select class="form-control form-control-sm" name="area_id" v-model="area" @change="getKinds()">
            <option active="true">Selecione o Área Jurídica</option>
            <option v-for="(value, id) in areas" :key="id" :value="id">
                {{ value }}
            </option>
        </select>
    </div>
    <div v-if="kinds" class="form-group m-0">
        <label class="m-0">Selecione Classe Processual</label>
        <select class="form-control form-control-sm" name="kind_process[kind_id]" v-model="kind">
            <option v-if="kinds" v-for="(value, id) in kinds" :key="id" :value="id">
                {{ value }}
            </option>
        </select>
    </div>
    <div class="form-group">
        <label class="m-0 text-muted">Lista de Classes Processuais</label>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            area: 0,
            areaName: '',
            areas: [],
            kind: 0,
            kinds: [],
        };
    },
    methods: {
        getAreas: function() {
            axios.get("/lawyer/getAreas")
            .then(
                function(response) {
                    this.areas = response.data;
                }.bind(this)
            );
        },

        getKinds: function() {
            axios.get("/lawyer/getKinds/", {
                params: {area_id: this.area}
            })
            .then(
                function(response) {
                    this.kinds = response.data;
                }.bind(this)
            );
        }
    },
    computed: {
        pname: function(){
            let name = '';
            if(this.area && this.kind)
                name = this.areas[this.area] + ' - ' + this.kinds[this.kind];
            else
                name = '';
            return name;
        }
    },
    created: function() {
        this.getAreas();
    }
};
</script>
