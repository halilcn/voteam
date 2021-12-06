<template>
  <div class="title">
    <i class="bi bi-people"></i>
    Üyeler
  </div>
  <div class="users">
    <div class="users-actions">
      <div class="add-user-btn">
        Üye Daveti Gönder
      </div>
    </div>
    <div class="user-list">
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 src="https://res.cloudinary.com/voteam/image/upload/v1638612621/vote-images/xpmplop9dicpgn5idh61.png">
            <div class="user-texts">
              <div class="user-name">
                Halil Can
              </div>
              <div class="user-role">
                üye
              </div>
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="user-info-list">
            <div class="item">
              <div class="title">
                Toplam Başlatılan Oylama
              </div>
              <div class="content">
                4
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 src="https://res.cloudinary.com/voteam/image/upload/v1638612621/vote-images/xpmplop9dicpgn5idh61.png">
            <div class="user-texts">
              <div class="user-name">
                Halil Can
              </div>
              <div class="user-role">
                üye
              </div>
            </div>
            <div class="user-waiting-invitation">
              <!-- <i class="fas fa-user-clock"></i>-->
              <i class="bi bi-hourglass-split"></i>
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="user-info-list">
            <div class="item">
              <div class="title">
                Toplam Başlatılan Oylama
              </div>
              <div class="content">
                4
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 src="https://res.cloudinary.com/voteam/image/upload/v1638612621/vote-images/xpmplop9dicpgn5idh61.png">
            <div class="user-texts">
              <div class="user-name">
                Halil Can
              </div>
              <div class="user-role">
                üye
              </div>
            </div>
            <div class="delete-user-btn">
              <i class="bi bi-person-dash"></i>
              çıkar
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="user-info-list">
            <div class="item">
              <div class="title">
                Toplam Başlatılan Oylama
              </div>
              <div class="content">
                4
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from 'vuex';

export default {
  name: 'Members',
  methods: {
    ...mapActions('teamUser', ['getUsersOfTeam'])
  },
  created() {
    this.getUsersOfTeam();
  }
};
</script>

<style lang="scss" scoped>
.title {
  font-weight: 400;
  font-size: 23px;
}

.users {
  .users-actions {
    display: flex;

    .add-user-btn {
      background-color: $df-blue-color;
      color: white;
      margin-left: auto;
    }

  }

  .user-list {
    display: flex;

    > .item {
      display: flex;
      flex-direction: column;
      border: 1px solid #839ccc;
      width: 270px;
      border-radius: 5px;

      .top {
        padding: 12px;

        .profile-info {
          display: flex;
          align-items: center;

          //TOD: aynı css, dynamic hale getirmek ?

          .user-image {
            width: 50px;
            height: 50px;
            border-radius: 100%;
          }

          .user-texts {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-left: 10px;

            .user-name {
              font-size: 15px;
            }

            .user-role {
              padding: 2px 6px;
              font-weight: 300;
              font-size: 11px;
              color: $df-blue-color;
              background-color: $df-very-light-blue-color;
              border-radius: 3px;
            }
          }

          .user-waiting-invitation {
            margin-left: auto;
          }

          .delete-user-btn {
            font-size: 12px;
            margin-left: auto;
            background-color: $df-very-light-red-color;
            color: $df-red-color;
            padding: 2px 5px;
            cursor: pointer;
          }
        }
      }

      .bottom {
        border-top: 1px solid #ECF0F8;

        .user-info-list {
          padding: 12px;

          .item {
            display: flex;
            align-items: center;
            justify-content: space-between;

            .title {
              font-size: 14px;
              font-weight: 300;
            }

            .content {
              font-weight: 300;
            }
          }

        }
      }
    }
  }
}
</style>
