<template>
  <create-team-popup
      @handlePopup="handleCreateTeamPopup"
      :is-enable="isEnableCreateTeamPopup"/>
  <join-team-popup
      @handlePopup="handleJoinTeamPopup"
      :is-enable="isEnableJoinTeamPopup"/>
  <div class="teams">
    <img class="voteam-logo" src="../assets/logos/voteam.png" alt="logo"/>
    <div class="teams-actions">
      <div @click="handleCreateTeamPopup" class="create-team-btn">
        <i class="bi bi-plus-lg"></i>
        <span class="txt">Takım Oluştur</span>
      </div>
      <div @click="handleJoinTeamPopup" class="join-team-btn">
        <i class="bi bi-people-fill"></i>
        <span class="txt">Takıma Katıl</span>
      </div>
      <div class="exit-btn">
        <i class="bi bi-box-arrow-right"></i>
        <span class="txt">Çıkış Yap</span>
      </div>
    </div>
    {{ $store.state.team.teams }}
    <div class="teams-list">
      <router-link
          class="item"
          :to="{name:'TeamDashboardHome',params:{teamId:'12'}}">
        <div class="team-main-info">
          <img src="../assets/illustrations/graphic.png" alt="team-img"/>
          <div class="team-name">
            test takım adı
          </div>
        </div>
        <div class="team-infos">
          <div class="title">
            Takım Kodu
          </div>
          <div class="content">
            #SFR32
          </div>
        </div>
        <div class="team-infos">
          <div class="title">
            Üye Sayısı
          </div>
          <div class="content">
            52 kişi
          </div>
        </div>
      </router-link>
      <router-link
          class="item"
          :to="{name:'TeamDashboardHome',params:{teamId:'12'}}">
        <div class="team-main-info">
          <img src="../assets/illustrations/graphic.png" alt="team-img"/>
          <div class="team-name">
            test 121
          </div>
        </div>
        <div class="team-infos">
          <div class="title">
            Takım Kodu
          </div>
          <div class="content">
            #SFR32
          </div>
        </div>
        <div class="team-infos">
          <div class="title">
            Üye Sayısı
          </div>
          <div class="content">
            52 kişi
          </div>
        </div>
      </router-link>
      <router-link
          class="item"
          :to="{name:'TeamDashboardHome',params:{teamId:'12'}}">
        <div class="team-main-info">
          <img src="../assets/illustrations/graphic.png" alt="team-img"/>
          <div class="team-name">
            asdsadsad asdas asdadsa 121
          </div>
        </div>
        <div class="team-infos">
          <div class="title">
            Takım Kodu
          </div>
          <div class="content">
            #SFR32
          </div>
        </div>
        <div class="team-infos">
          <div class="title">
            Üye Sayısı
          </div>
          <div class="content">
            52 kişi
          </div>
        </div>
      </router-link>
      <router-link
          class="item"
          :to="{name:'TeamDashboardHome',params:{teamId:'12'}}">
        <div class="team-main-info">
          <img src="../assets/illustrations/graphic.png" alt="team-img"/>
          <div class="team-name">
            asdsadsad asdaasdas dsadasdsa dasdass asdadsa 121
          </div>
        </div>
        <div class="team-infos">
          <div class="title">
            Takım Kodu
          </div>
          <div class="content">
            #SFR32
          </div>
        </div>
        <div class="team-infos">
          <div class="title">
            Üye Sayısı
          </div>
          <div class="content">
            52 kişi
          </div>
        </div>
      </router-link>
    </div>
  </div>
</template>

<script>
import CreateTeamPopup from '../components/teams/CreateTeamPopup';
import JoinTeamPopup from '../components/teams/JoinTeamPopup';
import { mapState, mapActions } from 'vuex';

export default {
  name: 'Teams',
  data() {
    return {
      isEnableCreateTeamPopup: false,
      isEnableJoinTeamPopup: false
    };
  },
  components: {
    CreateTeamPopup,
    JoinTeamPopup
  },
  methods: {
    ...mapActions(['getTeams']),
    handleCreateTeamPopup() {
      this.isEnableCreateTeamPopup = !this.isEnableCreateTeamPopup;
    },
    handleJoinTeamPopup() {
      this.isEnableJoinTeamPopup = !this.isEnableJoinTeamPopup;
    }
  },
  computed: {
    ...mapState(['teams'])
  },
  //TODO:before create?? loadign ekran ??
  async created() {
    await this.getTeams();
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
          background-color: red;
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
