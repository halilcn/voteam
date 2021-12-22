<template>
  <div class="team-settings setting">
    <div class="setting-title">
      TAKIM AYARLARI
    </div>
    <div class="top-settings-container">
      <div class="left-list">
        <div class="item">
          <div class="title">
            Takım Adı
          </div>
          <div class="content">
            <input type="text">
          </div>
        </div>
        <div class="item">
          <div class="title">
            Takım Kodu
          </div>
          <div class="content">
            <input type="text">
          </div>
        </div>
      </div>
      <div class="team-image">
        <img class="image" src="../../../../assets/test/team.png"/>
        <input type="file" id="team_image">
        <label for="team_image">
          Fotoğrafı Değiştir
        </label>
      </div>
    </div>
  </div>

  <div class="team-user-settings setting">
    <div class="setting-title">
      KULLANICI AYARLARI
    </div>
    <div class="list">
      <div class="item">
        <div class="title">
          Takımdan Çık
        </div>
        <div class="content leave-team-content">
          <div class="info">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text
            of the .
          </div>
          <div class="leave-team-btn">
            <i class="bi bi-door-closed-fill"></i>
            Takımdan Çık
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Settings'
};
</script>

<style lang="scss" scoped>

.setting {
  margin-bottom: 80px;

  .setting-title {
    font-weight: 600;
    font-size: 16px;
    color: $df-black-and-blue-color;
  }

  .item {
    margin: 15px 0;

    .title {

    }

    .content {
      width: 320px;

      input {
        @include std-input;
        margin-top: 10px;
      }
    }
  }
}

.team-settings {
  .setting-title {

  }

  .top-settings-container {
    display: flex;

    .left-list {
      width: 70%;
    }

    .team-image {
      width: 30%;
      display: flex;
      flex-direction: column;
      align-items: center;

      .image {
        width: 130px;
        height: 130px;
        border-radius: 100%;
      }

      input {
        display: none;
      }

      label {
        padding: 8px 13px;
        border-radius: 5px;
        margin-top: 25px;
        font-size: 15px;
        color: $df-dark-blue-color;
        background-color: #eef0f3;
        cursor: pointer;
        transition: .2s;

        &:hover {
          background-color: $df-light-black;
        }

      }
    }
  }
}

.team-user-settings {
  .list {
    .item {
      .leave-team-content {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;

        .leave-team-btn {
          padding: 6px 16px;
          cursor: pointer;
          color: $df-red-color;
          font-weight: 500;
          font-size: 15px;
          background-color: $df-very-light-red-color;
          border-radius: 5px;

          i {
            margin-right: 5px;
          }
        }
      }
    }
  }
}
</style>
