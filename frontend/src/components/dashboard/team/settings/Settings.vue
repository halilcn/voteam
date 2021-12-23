<template>
  <page-title>
    <i class="bi bi-gear"></i>
    Ayarlar
  </page-title>

  <div class="settings-container">
    <div class="team-settings setting">
      <div class="setting-title">
        TAKIM AYARLARI
      </div>
      <div class="list">
        <div class="item team-image">
          <div class="title">
            Takım Fotoğrafı
          </div>
          <div class="content">
            <img class="image" src="../../../../assets/test/team.png"/>
            <input type="file" id="team_image">
            <label for="team_image">
              Değiştir
            </label>
          </div>
        </div>
        <div class="item">
          <div class="title">
            Takım Adı
          </div>
          <div class="content">
            <input value="test takım ismi" type="text">
          </div>
        </div>
        <div class="post-team-setting-btn item">
          Kaydet
        </div>
      </div>
    </div>

    <div class="team-user-settings setting">
      <div class="setting-title">
        KULLANICI AYARLARI
      </div>
      <div class="list">
        <div class="item">
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
  </div>
</template>

<script>
import PageTitle from '../shared/PageTitle';

export default {
  name: 'Settings',
  components: {
    PageTitle
  }
};
</script>

<style lang="scss" scoped>

.settings-container {
  height: 100%;
  overflow-y: auto;
  padding: 3px 8px;

  .setting {
    @include center-lg-box-shadow;
    border-radius: 5px;
    margin: 20px 0;
    padding: 15px;

    .setting-title {
      display: inline-block;
      font-weight: 500;
      font-size: 16px;
      color: $df-blue-color;
      background-color: $df-very-light-blue-color;
      border-radius: 5px;
      padding: 5px 10px;
    }

    .list {
      display: flex;
      flex-direction: column;

      .item {
        margin: 20px 0;

        .title {
          color: $df-black-and-blue-color;
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
          width: 120px;
          height: 120px;
          border-radius: 100%;
        }

        input {
          display: none;
        }

        label {
          padding: 8px 13px;
          border-radius: 5px;
          font-size: 13px;
          color: $df-dark-blue-color;
          cursor: pointer;
          transition: .2s;
          margin-left: 30px;

          &:hover {
            background-color: #eef0f3;
          }
        }
      }

      &.post-team-setting-btn {
        margin-left: auto;
        padding: 8px 20px;
        background-color: $df-blue-color;
        color: white;
        border-radius: 5px;
        cursor: pointer;
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

          .info {
            font-size: 14px;
            font-weight: 300;
          }

          .leave-team-btn {
            padding: 8px 16px;
            cursor: pointer;
            color: $df-red-color;
            font-weight: 500;
            font-size: 13px;
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
}

</style>
