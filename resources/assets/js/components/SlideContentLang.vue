<template>
    <section>
        
        <b-field label="Slide Content">
            <b-select placeholder="Select Language"
                        icon="globe"
                        icon-pack="fa">
                <option
                    v-for="lang in data"
                    :value="lang[0]"
                    :key="lang[0]">
                    {{ lang[0] }}
                </option>
            </b-select>
        </b-field>

    </section>
</template>


<script>


    export default {
        data() {
            return {
                lang: ['az']
            }
        }
    }
</script>