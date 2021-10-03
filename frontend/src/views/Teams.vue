<template>
  <create-team-popup
      @handlePopup="handleCreateTeamPopup"
      :is-enable="isEnableCreateTeamPopup"/>
  <join-team-popup
      @handlePopup="handleJoinTeamPopup"
      :is-enable="isEnableJoinTeamPopup"/>
  <div class="teams">
    <img class="voteam-logo" src="../assets/logos/voteam.png" alt="voteam-logo"/>
    <div class="teams-actions">
      <div @click="handleCreateTeamPopup" class="create-team-btn">
        <i class="bi bi-plus-lg"></i>
        <span class="txt">Takım Oluştur</span>
      </div>
      <div @click="handleJoinTeamPopup" class="join-team-btn">
        <i class="bi bi-people-fill"></i>
        <span class="txt">Takıma Katıl</span>
      </div>
      <div @click="logout" class="exit-btn">
        <i class="bi bi-box-arrow-right"></i>
        <span class="txt">Çıkış Yap</span>
      </div>
    </div>
    <div class="teams-list">
      <template v-if="!isLoadingTeams">
        <template v-if="teams.length > 0">
          <router-link
              v-for="(team,index) in teams"
              :key="index"
              class="item"
              :to="{name:'TeamDashboardHome',params:{teamId:team.key}}">
            <div class="team-main-info">
              <img :src="team.image" alt="team-img"/>
              <div class="team-name">
                {{ team.name }}
              </div>
            </div>
            <div class="team-infos">
              <div class="title">
                Takım Kodu
              </div>
              <div class="content">
                {{ team.join_code }}
              </div>
            </div>
            <div class="team-infos">
              <div class="title">
                Üye Sayısı
              </div>
              <div class="content">
                {{ team.users_count }} kişi
              </div>
            </div>
          </router-link>
        </template>
        <div v-else class="no-team">
          <i class="bi bi-emoji-frown"></i>
          Şuan hiç takımın yok. Takım oluşturabilir ya da takımlara katılabilirsin.
        </div>
      </template>
      <loading-animation
          v-else
          :textLineCount="3"
          :textCount="3"
          :textLineHeight="14"/>
    </div>
  </div>
</template>

<script>
import CreateTeamPopup from '../components/teams/CreateTeamPopup';
import JoinTeamPopup from '../components/teams/JoinTeamPopup';
import LoadingAnimation from '../components/shared/LoadingAnimation';
import { mapState, mapActions } from 'vuex';

export default {
  name: 'Teams',
  data() {
    return {
      isEnableCreateTeamPopup: false,
      isEnableJoinTeamPopup: false,
      isLoadingTeams: true
    };
  },
  components: {
    CreateTeamPopup,
    JoinTeamPopup,
    LoadingAnimation
  },
  methods: {
    ...mapActions('team', ['getTeams']),
    ...mapActions('auth', ['postLogout']),
    handleCreateTeamPopup() {
      this.isEnableCreateTeamPopup = !this.isEnableCreateTeamPopup;
    },
    handleJoinTeamPopup() {
      this.isEnableJoinTeamPopup = !this.isEnableJoinTeamPopup;
    },
    logout() {
      this.handle(async () => {
        await this.postLogout();
        this.$router.push({ name: 'Home' });
      });
    }
  },
  computed: {
    ...mapState('team', ['teams'])
  },
  created() {
    this.handle(async () => {
      await this.getTeams();
      this.isLoadingTeams = false;
    });
  }
};
</script>

<style lang="scss" scoped>
.teams {
  padding: $df-dsktp-lr-width-pdn;
  display: flex;
  flex-direction: column;

  .voteam-logo {
    align-self: center;
    width: 150px;
    margin-bottom: 20px;
  }

  .teams-actions {
    display: flex;

    div {
      padding: 7px 15px;
      cursor: pointer;
      font-size: 15px;
      border-radius: 5px;
      color: white;
      transition: .3s;

      .txt {
        margin-left: 5px;
      }
    }

    .create-team-btn {
      background-color: $df-green-color;

      &:hover {
        background-color: $df-dark-green-color;
      }
    }

    .join-team-btn {
      margin-left: 20px;
      background-color: #eeeeee;
      color: $df-dark-blue-color;

      &:hover {
        background-color: #e7e7e7;
      }
    }

    .exit-btn {
      margin-left: auto;
      background-color: $df-very-light-red-color;
      color: $df-red-color;

      &:hover {
        background-color: #ffe8e8;
      }
    }
  }

  .teams-list {
    border-top: 1px solid #e8e8e8;
    padding-top: 20px;
    margin-top: 20px;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;

    .item {
      @include center-md-box-shadow;
      width: 48%;
      background-color: white;
      display: flex;
      align-items: center;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      margin-bottom: 15px;
      transition: .2s;

      &:hover {
        transform: scale(1.02);
      }

      .team-main-info {
        width: 30%;
        display: flex;
        flex-direction: column;
        align-items: center;
        border-right: 1px solid #e1e1e1;

        img {
          width: 60px;
          height: 60px;
          border-radius: 100%;
        }

        .team-name {
          margin-top: 7px;
          font-size: 14px;
          color: $df-blue-color;
          text-align: center;
        }
      }

      .team-infos {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        width: 35%;

        .title {
          font-size: 16px;
          color: #3b3b3b;
        }

        .content {
          font-size: 14px;
          margin-top: 8px;
          background-color: #f6f6f6;
          color: #595959;
          font-weight: 500;
          padding: 6px 10px;
          border-radius: 4px;
        }
      }
    }

    .no-team {
      font-weight: 300;
      margin: 20px auto 0 auto;
      font-size: 15px;
      color: #818181;
    }
  }
}

@media only screen and (max-width: $df-mobile-width) {
  .teams {
    padding: $df-mbl-lr-width-pdn;

    .teams-actions {
      display: flex;
      justify-content: space-between;

      div {
        width: 48%;
        padding: 6px 12px;
        font-size: 13px;
        text-align: center;
      }

      .join-team-btn {
        margin-left: 0;
      }

      .exit-btn {
        width: auto;
        position: absolute;
        right: 0;
        top: 0;
        border-radius: 0 0 0 5px;

        .txt {
          display: none;
        }
      }
    }

    .teams-list {
      margin-top: 20px;

      .item {
        width: 100%;
        padding: 5px;

        .team-main-info {
          width: 200px;

          img {
            width: 40px;
            height: 40px;
          }

          .team-name {
            margin-top: 5px;
            font-size: 11px;
          }
        }

        .team-infos {
          width: 100%;

          .title {
            font-size: 12px;
          }

          .content {
            font-size: 11px;
            padding: 4px 8px;
          }
        }
      }
    }
  }
}
</style>
