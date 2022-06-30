<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">Profile details</h5>
                        <router-link :to="{name:'account-edit'}" class="btn btn-primary">
                            {{ $t('editProfile') }}
                        </router-link>
                    </div>
                    <div class="card-body">
                        <span class="d-flex justify-content-between mb-3">
                          <span class="text-muted">{{ $t('name') }}</span>
                          <span class="fw-bold">{{ $store.getters['admin/user'].name }}</span>
                        </span>
                        <span class="d-flex justify-content-between mb-3">
                          <span class="text-muted">{{ $t('company') }}</span>
                          <span class="fw-bold">{{ $store.getters['admin/user'].company }}</span>
                        </span>
                        <span class="d-flex justify-content-between mb-3">
                          <span class="text-muted">{{ $t('position') }}</span>
                          <span class="fw-bold">{{ $store.getters['admin/user'].position }}</span>
                        </span>
                        <span class="d-flex justify-content-between mb-3">
                          <span class="text-muted">{{ $t('phone') }}</span>
                          <span class="fw-bold">{{ $store.getters['admin/user'].phone }}</span>
                        </span>
                        <span class="d-flex justify-content-between">
                          <span class="text-muted">{{ $t('email') }}</span>
                          <span class="fw-bold">{{ $store.getters['admin/user'].email }}</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">
                            {{ $t('security') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <span>
                            <span class="d-block text-black fw-bold"> {{ $t('tfa') }}
                              <Tooltip :title="$t('tfaHelp')">
                                <i class="bi bi-info-circle-fill ms-1 d-inline-block"/>
                              </Tooltip>
                            </span>
                            <small v-if="$store.getters['admin/tfaEnabled']"
                                   class="text-muted d-flex align-items-center">
                                <i class="bi bi-check-all text-success fs-4" aria-label="Success"/>
                                <span>{{ $t('enabled') }}</span>
                            </small>
                            <small v-else class="text-muted d-flex align-items-center">
                                <i class="bi bi-exclamation-circle text-danger fs-6 me-2" aria-label="Success"/>
                                <span>{{ $t('notEnabled') }}</span>
                            </small>
                          </span>
                            <div class="fw-bold">
                                <div v-if="$store.getters['admin/tfaEnabled']">
                                    <Button type="button" class="btn btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#disable2FA">{{ $t('disable') }}
                                    </Button>
                                    <Button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#enable2FA">{{ $t('regenerate') }}
                                    </Button>
                                </div>
                                <Button v-else type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#enable2FA">{{ $t('enable') }}
                                </Button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span>
                                <span class="d-block text-black fw-bold">
                                  {{ $t('smsAuth') }}
                                  <Tooltip title="Activating will disable 2FA.">
                                    <i class="bi bi-info-circle-fill ms-1 d-inline-block"/>
                                  </Tooltip>
                                </span>
                                <small v-if="$store.getters['admin/smsEnabled']"
                                       class="text-muted d-flex align-items-center">
                                    <i class="bi bi-check-all text-success fs-4" aria-label="Success"/>
                                  <span>{{ $t('enabled') }}</span>
                                </small>
                                <small v-else class="text-muted d-flex align-items-center">
                                    <i class="bi bi-exclamation-circle text-danger fs-6 me-2" aria-label="Success"/>
                                    <span>{{ $t('notEnabled') }}</span>
                                </small>
                            </span>
                            <div class="fw-bold">
                                <div v-if="$store.getters['admin/smsEnabled']">
                                    <Button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#disableSMS">{{ $t('disable') }}
                                    </Button>
                                </div>
                                <Button v-else type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#enableSMS">{{ $t('enable') }}
                                </Button>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <span>
                            <span class="d-block text-black fw-bold">{{ $t('password') }}</span>
                            <small class="text-muted d-flex align-items-center">
                              {{ $t('previouslyUpdated') }} {{ $store.getters['admin/user'].password_changed_at }}
                            </small>
                          </span>
                            <div class="fw-bold">
                                <div>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#changePassword"
                                    >{{ $t('changePassword') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold m-0">{{ $t('loginSessions') }}</h5>
                        <Button type="submit" @click.native="expireOtherSessions" class="btn btn-danger">
                            {{ $t('expireSessions') }}
                        </Button>
                    </div>
                    <div class="card-body">
                        <Table ref="sessionsTable" url="/admin/session" :columns="sessionsTableColumns">
                            <template #operations="slotData">
                                <button type="submit" :disabled="!slotData.row.can_be_expired"
                                        @click="expireSession(slotData.row.id)"
                                        class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </template>
                        </Table>
                    </div>
                </div>
            </div>
        </div>

        <Disable2FA/>
        <DisableSMS/>
        <EnableSMS/>
        <Enable2FA/>
        <ChangePassword/>
    </div>
</template>

<script>
import Button from '../components/Button'
import Enable2FA from '../components/Enable2FA'
import EnableSMS from '../components/EnableSMS'
import Disable2FA from '../components/Disable2FA'
import DisableSMS from '../components/DisableSMS'
import ChangePassword from '../components/ChangePassword'
import Tooltip from '../components/Tooltip'
import Table from '../components/Table'
import http from "../plugins/axios";

export default {
    name: "AccountSettings",
    components: {
        Button, Enable2FA, Disable2FA, Tooltip, EnableSMS, DisableSMS, ChangePassword, Table
    },
    data() {
        return {
            sessionsTableColumns: [
                {
                    name: '#',
                    key: 'id',
                    orderBy: 'id',
                },
                {
                    name: this.$t('ipAddress'),
                    key: 'ip_address',
                    orderBy: 'ip',
                },
                {
                    name: this.$t('status'),
                    key: 'status',
                    orderBy: false
                },
                {
                    name: this.$t('location'),
                    key: 'location',
                    orderBy: 'location',
                },
                {
                    name: this.$t('device'),
                    key: 'device'
                },
                {
                    name: this.$t('createdAt'),
                    key: 'created_at',
                    orderBy: 'created_at'
                }
            ]
        }
    },
    async mounted() {
        await this.$store.dispatch('admin/getSMS')
    },
    methods: {
        async expireSession(id) {
            await http.delete('admin/session/' + id)

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('sessionsRemoved'),
                time: this.$t('now')
            })

            await this.$refs.sessionsTable.getResults()
        },

        async expireOtherSessions() {
            await http.delete('admin/session')

            await this.$store.dispatch('toast/show', {
                title: this.$t('success'),
                icon: 'success',
                message: this.$t('sessionsClearedExceptCurrent'),
                time: this.$t('now')
            })

            await this.$refs.sessionsTable.getResults()
        }
    }
}
</script>

<style lang="scss" scoped>
</style>
