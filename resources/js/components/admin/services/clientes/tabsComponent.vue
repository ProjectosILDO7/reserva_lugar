<template>
    <div class="nav nav-tabs card-header-tabs">
        <tabs :options="{ useUrlFragment: false }" @clicked="tabClicked" @changed="tabChanged" nav-item-class="nav-item">
            <tab name="First tab">
                This is the content of the first tab
            </tab>
            <tab name="Second tab">
                This is the content of the second tab
            </tab>
            <tab name="Disabled tab" :is-disabled="true">
                This content will be unavailable while :is-disabled prop set to true
            </tab>
            <tab id="oh-hi-mark" name="Custom fragment">
                The fragment that is appended to the url can be customized
            </tab>
            <tab prefix="<span class='glyphicon glyphicon-star'></span> " name="Prefix and suffix"
                suffix=" <span class='badge'>4</span>">
                A prefix and a suffix can be added
            </tab>
        </tabs>

        
    </div>
</template>

<script>

export default {

    data() {
        return {
            testTabs: null
        }
    },

    methods: {
        tabClicked(selectedTab) {
            console.log('Current tab re-clicked:' + selectedTab.tab.name)
        },
        tabChanged(selectedTab) {
            console.log('Tab changed to:' + selectedTab.tab.name)
        }
    }
}

</script>

<style scoped>
ul {
    list-style-type: none;
}
</style>