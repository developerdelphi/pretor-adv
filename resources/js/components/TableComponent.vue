<template>
    <div>
        <table class="table table-hover table-striped table-sm" id="pretor-table">
            <thead>
                <th>Nome</th>
                <th class="text-right pr-2">Ações</th>
            </thead>
            <tbody>
                <tr>
                    <td>nome</td>

                    <td class="text-right">
                        botões de action
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
