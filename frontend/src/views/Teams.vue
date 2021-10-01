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
        Takım Oluştur
      </div>
      <div @click="handleJoinTeamPopup" class="join-team-btn">
        <i class="bi bi-people-fill"></i>
        Takıma Katıl
      </div>
      <div class="exit-btn">
        <i class="bi bi-box-arrow-right"></i>
        Çıkış Yap
      </div>
    </div>
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
    handleCreateTeamPopup() {
      this.isEnableCreateTeamPopup = !this.isEnableCreateTeamPopup;
    },
    handleJoinTeamPopup() {
      this.isEnableJoinTeamPopup = !this.isEnableJoinTeamPopup;
    }
  }

};
</script>

<style lang="scss" scoped>
.teams {
  padding: 15px;
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

}
</style>
