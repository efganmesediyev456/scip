<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">
                            {{ $t('updateProfileTitle') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <form
                            class="w-100 d-flex"
                            enctype="multipart/form-data"
                            @submit.prevent="save"
                        >
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div
                                            class="d-flex flex-column justify-content-center align-items-center image position-relative"
                                        >
                                            <img
                                                v-if="file"
                                                :src="fileToImg()"
                                                :alt="$t('profilePicture')"
                                            >
                                            <img
                                                v-else-if="showDefault"
                                                src="/assets/admin/static/profile.svg"
                                                :alt="$t('profilePicture')"
                                            >
                                            <img
                                                v-else
                                                :src="$store.getters['admin/user'].picture"
                                                :alt="$t('profilePicture')"
                                            >

                                            <File
                                                name="profileInput"
                                                :names.sync="profileData.image"
                                                :files.sync="file"
                                                :required="false"
                                                class="position-absolute top-0 opacity-0"
                                            />
                                            <div>
                                                <label for="profileInputFileInput">
                                                    <Tooltip title="Edit picture">
                                                        <i class="bi bi-pencil-square me-2 fs-4 text-muted"/>
                                                    </Tooltip>
                                                </label>
                                                <Tooltip
                                                    :title="$t('pictureRemove')"
                                                    @click.native="showDefault = true; profileData.image = null; file = null"
                                                >
                                                    <i class="bi bi-trash text-danger fs-4"/>
                                                </Tooltip>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <Input
                                                    v-model="profileData.name"
                                                    class="w-50 col-md-6"
                                                    name="name"
                                                    :label="$t('name')"
                                                />
                                                <Input
                                                    v-model="profileData.position"
                                                    class="w-50 col-md-6"
                                                    name="position"
                                                    :label="$t('position')"
                                                />
                                                <Input
                                                    v-model="profileData.company"
                                                    class="w-50 col-md-6"
                                                    name="company"
                                                    :label="$t('company')"
                                                />
                                                <Input
                                                    v-model="profileData.phone"
                                                    class="w-50 col-md-6"
                                                    name="phone"
                                                    :label="$t('phone')"
                                                />
                                                <div class="col-md-12">
                                                    <Button
                                                        type="submit"
                                                        class="btn btn-primary ms-auto"
                                                    >
                                                        {{ $t('save') }}
                                                    </Button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Button from '../components/Button'
import File from '../components/File'
import Input from '../components/Input'
import Tooltip from '../components/Tooltip'
import http from "../plugins/axios";

export default {
    name: "AccountEdit",
    components: {
        Button, Input, File, Tooltip
    },
    data() {
        return {
            file: null,
            showDefault: false,
            profileData: {
                name: null,
                position: null,
                phone: null,
                company: null,
            }
        }
    },

    mounted() {
        this.profileData.name = this.$store.getters['admin/user'].name
        this.profileData.position = this.$store.getters['admin/user'].position
        this.profileData.phone = this.$store.getters['admin/user'].phone
        this.profileData.company = this.$store.getters['admin/user'].company
    },

    methods: {
        async save() {
            const data = this.profileData

            if (this.profileData.hasOwnProperty('image')) {
                data.profile = this.profileData.image
            }

            await http.put('admin/profile', data)

            await this.$store.dispatch('admin/getUser')
            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('profileUpdated'),

            })
        },

        fileToImg() {
            return URL.createObjectURL(this.file)
        }
    }
}
</script>

<style lang="scss" scoped>
.image {
    img {
        width: 169px;
        height: 169px;
        border-radius: 100%;
    }

    .bi-trash, .bi-pencil-square {
        right: 10px;
    }
}
</style>
