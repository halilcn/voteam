<template>
  <div class="teams">
    <div class="teams-actions">
      <div class="create-team-btn">
        <i class="bi bi-plus-lg"></i>
        Takım Oluştur
      </div>
      <div class="join-team-btn">
        <i class="bi bi-people-fill"></i>
        Takıma Katıl
      </div>
    </div>
    <div class="teams-list">
      <div class="item">
        <div class="team-main-info">
          <img src="../assets/illustrations/graphic.png"/>
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
      </div>
      <div class="item">
        <div class="team-main-info">
          <img src="../assets/illustrations/graphic.png"/>
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
      </div>
      <div class="item">
        <div class="team-main-info">
          <img src="../assets/illustrations/graphic.png"/>
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
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Teams'
};
</script>

<style lang="scss" scoped>
.teams {
  padding: 15px;

  .teams-actions {
    display: flex;

    div {
      padding: 7px 15px;
      cursor: pointer;
      font-size: 15px;
      border-radius: 5px;
      color: white;
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

      &:hover{
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
</style>
