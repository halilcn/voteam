<template>
  <continue-popup
      :is-enable="isEnableContinuePopup"
      @handlePopup="toggleContinuePopup"
      @continue="deleteUserOfTeamAction"/>
  <loading-animation
      v-if="isLoading"
      :text-line-count="10"/>
  <div v-else class="user-list">
    <div
        v-for="(user,index) in users"
        :key="index"
        class="item-container">
      <div class="item">
        <div class="top">
          <div class="profile-info">
            <img class="user-image"
                 :src="user.image"
                 alt="user-image">
            <div class="user-texts">
              <div :title="user.name" class="user-name">
                {{ user.name }}
              </div>
              <div class="user-role">
                {{ convertRoleOfMemberToLocalLanguage(user.role) }}
              </div>
            </div>
            <div
                @click="deleteUserOfTeamContinue(user.team_user_id)"
                :class="{disable:!userHasPermissions}"
                class="delete-user-btn">
              <i class="bi bi-person-dash"></i>
              {{ $t('dashboard.members.list.delete') }}
            </div>
          </div>
        </div>
        <div class="bottom">
          <div class="user-info-list">
            <div v-if="user.votes_count > 0" class="item">
              <div class="title">
                <i class="far fa-chart-bar"></i>
                {{ $t('dashboard.members.list.totalVotes') }}
              </div>
              <div class="content">
                {{ user.votes_count }}
              </div>
            </div>
            <div v-else class="item no-votes">
              <i class="bi bi-emoji-frown"></i>
              {{ $t('dashboard.members.list.notStartVote') }}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
        v-for="(invitation,index) in userInvitations"
        :key="index"
        class="item-container">
      <div class="item user-waiting-invitation">
        <div class="content">
          <div class="info">
            <div class="text">
              <i class="bi bi-envelope-fill"></i>
              {{ $t('dashboard.members.list.sentInvitation') }}
            </div>
            <div class="time">
              ({{ $dayjs(invitation.created_at).fromNow() }})
            </div>
          </div>
          <div class="user-info">
            <div class="email">
              {{ invitation.email }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import LoadingAnimation from '../../../shared/LoadingAnimation';
import ContinuePopup from '../../../shared/ContinuePopup';
import { mapActions } from 'vuex';

export default {
  name: 'MembersList',
  props: ['users', 'userInvitations', 'isLoading', 'userHasPermissions'],
  data() {
    return {
      isEnableContinuePopup: false,
      teamUserIdForDelete: null
    };
  },
  components: {
    LoadingAnimation,
    ContinuePopup
  },
  methods: {
    ...mapActions('teamUser', ['deleteUserOfTeam']),
    convertRoleOfMemberToLocalLanguage(role) {
      //TODO:multiple language!
      return role;
    },
    toggleContinuePopup() {
      this.isEnableContinuePopup = !this.isEnableContinuePopup;
    },
    deleteUserOfTeamContinue(teamUserId) {
      this.teamUserIdForDelete = teamUserId;
      this.toggleContinuePopup();
    },
    deleteUserOfTeamAction() {
      this.handle(async () => {
        await this.deleteUserOfTeam(this.teamUserIdForDelete);
      })
          .finally(() => {
            this.$emit('update:should-get-users-of-team', true);
          });
    }
  }
};
</script>

<style lang="scss" scoped>
$item-border-color: #dde6f8;
$default-padding: 12px;

$responsive-max-width-large-screen: 1420px;
$responsive-max-width-medium-screen: 1160px;
$responsive-max-width-small-screen: 920px;

.user-list {
  overflow-y: auto;
  display: flex;
  flex-wrap: wrap;
  margin-top: 15px;

  &::-webkit-scrollbar {
    width: 6px;
  }

  .item-container {
    display: flex;
    justify-content: center;
    width: 20%;
    margin: 10px 0;

    > .item {
      display: flex;
      flex-direction: column;
      border: 1px solid $item-border-color;
      width: 250px;
      height: 125px;
      border-radius: 5px;
      transition: .2s;

      &:hover {
        transform: scale(1.04);
        border-color: #b2cdff;

        .bottom {
          border-color: #b2cdff;
        }

        .top .profile-info .delete-user-btn {
          opacity: 1;
        }
      }

      &.user-waiting-invitation {
        padding: $default-padding;
        font-size: 13px;
        border-color: #93eac7;
        text-align: center;

        .content {
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          height: 100%;

          .info {
            .text {
              font-weight: 500;
              color: $df-green-color;

              i {
                margin-right: 4px;
              }
            }

            .time {
              font-style: italic;
              font-weight: 300;
              color: $df-black-and-blue-color;
            }
          }

          .user-info {
            margin-top: 15px;

            .email {
              background-color: $df-very-light-blue-color;
              color: $df-blue-color;
              padding: 3px 10px;
              border-radius: 4px;
            }
          }
        }
      }

      .top {
        padding: $default-padding;

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
            margin-left: 13px;

            .user-name {
              @include text-width-limit;
              width: 80px;
              font-size: 15px;
              color: $df-dark-blue-color;
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

          .delete-user-btn {
            border: 1px solid $df-very-light-red-color;
            font-size: 12px;
            margin-left: auto;
            color: $df-red-color;
            padding: 3px 6px;
            cursor: pointer;
            border-radius: 4px;
            opacity: 0;
            transition: .2s;

            &:hover {
              background-color: $df-very-light-red-color;
            }

            &.disable {
              display: none;
            }

            i {
              margin-right: 4px;
            }
          }
        }
      }

      .bottom {
        transition: .2s;
        border-top: 1px solid $item-border-color;
        height: 100%;

        .user-info-list {
          padding: $default-padding;
          height: 100%;
          display: flex;
          flex-direction: column;
          justify-content: center;

          .item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: $df-black-and-blue-color;
            font-weight: 300;
            font-size: 13px;

            &.no-votes {
              font-style: italic;
              justify-content: center;
              color: #909fb0;

              i {
                margin-right: 6px;
              }
            }

            .title {
              display: flex;
              align-items: center;

              i {
                margin-right: 7px;
              }
            }
          }
        }
      }
    }
  }
}

@media only screen and (max-width: $responsive-max-width-large-screen) {
  .user-list > .item-container {
    width: 25% !important;
  }
}

@media only screen and (max-width: $responsive-max-width-medium-screen) {
  .user-list > .item-container {
    width: 33.33% !important;
  }
}

@media only screen and (max-width: $responsive-max-width-small-screen) {
  .user-list > .item-container {
    width: 50% !important;
  }
}
</style>
