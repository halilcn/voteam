<template>
  <page-title>
    <i class="bi bi-gear"></i>
    {{ $t('dashboard.settings.title') }}
  </page-title>
  <loading-animation
      v-if="isLoading.userPermission || isLoading.getSettings"
      :textLineCount="6"
      :textCount="2"/>
  <div v-else class="settings-container">
    <delete-user-popup
        :is-enable="isEnableContinuePopup"
        @handlePopup="toggleContinuePopup"
        @continue="leaveTheTeamAction"/>
    <div v-if="userHasPermission" class="team-settings setting">
      <div class="setting-title">
        <i class="bi bi-circle-fill"></i>
        {{ $t('dashboard.settings.team.title') }}
      </div>
      <div class="list">
        <div class="item">
          <div class="title">
            {{ $t('dashboard.settings.team.name') }}
          </div>
          <div class="content">
            <input v-model="settings.name" type="text">
          </div>
        </div>
        <div class="item team-image">
          <div class="title">
            {{ $t('dashboard.settings.team.image') }}
          </div>
          <div class="content">
            <img :src="teamImageUrl"
                 class="image"
                 alt="team-image"/>
            <input @change="onChangeFile" type="file" id="team_image">
            <label for="team_image">
              <i class="bi bi-arrow-repeat"></i>
              {{ $t('dashboard.settings.team.change') }}
            </label>
          </div>
        </div>
        <errors v-if="v$.settings.$invalid"
                :content="[$t('dashboard.settings.team.fieldEmptyInfo')]"
                class="item"/>
        <standart-button class="post-team-setting-btn item"
                         :text="$t('dashboard.settings.team.save')"
                         @click="updateSettingsAction"
                         :is-disable="isLoading.postSettings || !settingsDataChanged || v$.settings.$invalid"/>
      </div>
    </div>
    <div class="team-user-settings setting">
      <div class="setting-title">
        <i class="bi bi-circle-fill"></i>
        {{ $t('dashboard.settings.member.title') }}
      </div>
      <div class="list">
        <div class="item">
          <div class="content leave-team-content">
            <div class="info">
              {{ $t('dashboard.settings.member.leaveTeamInfo') }}
              <span>
               {{ $t('dashboard.settings.member.leaveTeamInfoUnderlined') }}
              </span>
            </div>
            <div @click="toggleContinuePopup" class="leave-team-btn">
              <i class="bi bi-door-closed-fill"></i>
              {{ $t('dashboard.settings.member.leaveTeam') }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PageTitle from '../shared/PageTitle';
import StandartButton from '../../../shared/elements/StandartButton';
import DeleteUserPopup from '../shared/DeleteUserPopup';
import Errors from '../../../shared/Errors';
import LoadingAnimation from '../../../shared/LoadingAnimation';
import validateMixin from '../../../../mixins/validateMixin';
import { mapActions } from 'vuex';

export default {
  name: 'Settings',
  mixins: [validateMixin],
  data() {
    return {
      v$: this.useVuelidate(),
      temporaryTeamImageUrl: '',
      settingsDataChanged: false,
      userHasPermission: false,
      isLoading: {
        getSettings: false,
        postSettings: false,
        userPermission: false
      },
      settings: {},
      isEnableContinuePopup: false
    };
  },
  validations() {
    return {
      settings: {
        name: {
          required: this.multipleLangError('errors.required', this.validators.required)
        },
        image: {
          required: this.multipleLangError('errors.required', this.validators.required)
        }
      }
    };
  },
  watch: {
    settings: {
      handler(newVal, oldVal) {
        if (Object.keys(oldVal).length !== 0) this.settingsDataChanged = true;
      },
      deep: true
    }
  },
  components: {
    PageTitle,
    StandartButton,
    Errors,
    LoadingAnimation,
    DeleteUserPopup
  },
  methods: {
    ...mapActions('teamSetting', ['getSettings', 'updateSettings']),
    ...mapActions('teamUser', ['getPermissionsUserOfTeam', 'deleteMeFromTeam']),
    onChangeFile(event) {
      this.settings.image = event.target.files[0];
      this.temporaryTeamImageUrl = this.$helpers.createTemporaryUrl(this.settings.image);
    },
    getSettingsAction() {
      this.handle(async () => {
        this.isLoading.getSettings = true;
        this.settings = await this.getSettings();
      }).finally(() => {
        this.isLoading.getSettings = false;
      });
    },
    updateSettingsAction() {
      this.handle(async () => {
        this.isLoading.postSettings = true;
        await this.updateSettings(this.settings);
        this.$notify.success(this.$t('dashboard.settings.updatedSettings'));
      }).finally(() => {
        this.isLoading.postSettings = false;
      });
    },
    async getPermissionsUserOfTeamAction() {
      await this.handle(async () => {
        this.isLoading.userPermission = true;
        const { all_permissions } = await this.getPermissionsUserOfTeam();
        this.userHasPermission = all_permissions;
      }).finally(() => {
        this.isLoading.userPermission = false;
      });
    },
    toggleContinuePopup() {
      this.isEnableContinuePopup = !this.isEnableContinuePopup;
    },
    leaveTheTeamAction() {
      this.handle(async () => {
        await this.deleteMeFromTeam();
        this.$router.push({ name: 'TeamsList' });
      });
    }
  },
  computed: {
    teamImageUrl() {
      return this.temporaryTeamImageUrl === '' ? this.settings.image : this.temporaryTeamImageUrl;
    }
  },
  async created() {
    await this.getPermissionsUserOfTeamAction();
    if (this.userHasPermission) await this.getSettingsAction();
  }
};
</script>

<style lang="scss" scoped>
.settings-container {
  height: 100%;
  overflow-y: auto;
  padding: 3px;

  .setting {
    @include center-lg-box-shadow;
    display: flex;
    flex-direction: column;
    border-radius: 5px;
    margin: 20px 0;
    padding: 35px;

    .setting-title {
      align-self: flex-start;
      display: flex;
      align-items: center;
      font-weight: 500;
      font-size: 16px;
      color: $df-blue-color;
      background-color: $df-very-light-blue-color;
      border-radius: 5px;
      padding: 5px 10px;

      i {
        font-size: 8px;
        margin-right: 8px;
      }
    }

    .list {
      display: flex;
      flex-direction: column;

      .item {
        margin: 18px 0;

        .title {
          color: $df-black-and-blue-color;
          font-size: 16px;
        }

        .content {
          width: 320px;
          margin-top: 8px;

          input {
            @include std-input;
          }
        }
      }
    }
  }

  .team-settings {
    .list .item {
      &.team-image .content {
        display: flex;
        align-items: center;

        .image {
          width: 115px;
          height: 115px;
          border-radius: 100%;
        }

        input {
          display: none;
        }

        label {
          font-size: 14px;
          color: $df-black-and-blue-color;
          cursor: pointer;
          transition: .2s;
          margin-left: 35px;

          &:hover {
            text-decoration: underline;
            color: $df-dark-blue-color;
          }

          i {
            margin-right: 5px;
          }
        }
      }

      &.post-team-setting-btn {
        margin-left: auto;
        padding: 8px 20px;
      }
    }
  }

  .team-user-settings .list .item .content {
    &.leave-team-content {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;

      .info {
        font-size: 14px;
        font-weight: 300;
        color: $df-dark-blue-color;

        span {
          font-weight: 400;
          text-decoration: underline;
        }
      }

      .leave-team-btn {
        padding: 8px 16px;
        cursor: pointer;
        background-color: #fff2f2;
        color: $df-red-color;
        font-weight: 500;
        font-size: 13px;
        border-radius: 5px;
        transition: .2s;

        i {
          margin-right: 5px;
        }

        &:hover {
          background-color: #ffe7e7;
        }
      }
    }
  }
}
</style>
