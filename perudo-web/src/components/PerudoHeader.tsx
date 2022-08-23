import { UserModel } from '../perudo/domain/user.model';
import React from 'react';
import { Header, PerudoTitle, Typography } from '../Styles';
import { UserService } from '../perudo/infra/user.service';
import { useNavigate } from 'react-router-dom';

type Props = { loading: boolean, userService: UserService };

export const PerudoHeader: React.FC<Props> = ({ loading, userService }) => {
  const icons = ['🦜', '🐓', '🦃', '🦤', '🦚', '🦢', '🦩', '🕊', '🦄', '🦥'];
  const backgroundColors = [
    'linear-gradient(180deg, #FE0000 16.66%, #FD8C00 16.66%, 33.32%, #FFE500 33.32%, 49.98%, #119F0B 49.98%, 66.64%, #0644B3 66.64%, 83.3%, #C22EDC 83.3%)',
    'linear-gradient(180deg, #181818 25%, #A3A3A3 25%, 50%, #FFFFFF 50%, 75%, #800080 75%)',
    'linear-gradient(180deg, #D60270 40%, #9B4F96 40%, 60%, #0038A8 60%)',
    'linear-gradient(180deg, #39A33E 20%, #A2CF72 20%, 40%, #FFFFFF 40%, 60%, #A3A3A3 60%, 80%, #181818 80%)',
    'linear-gradient(180deg, #FFF430 25%, #FFFFFF 25%, 50%, #9C59D1 50%, 75%, #181818 75%)',
    'linear-gradient(180deg, #5BCEFA 20%, #F5A9B8 20%, 40%, #FFFFFF 40%, 60%, #F5A9B8 60%, 80%, #5BCEFA 80%)',
    'linear-gradient(180deg, #B57EDC 33.33%, #FFFFFF 33.33%, 66.66%, #4A8123 66.66%)',
    'linear-gradient(180deg, #FF77A3 20%, #FFFFFF 20%, 40%, #BE18D6 40%, 60%, #181818 60%, 80%, #333EBD 80%)',
    'linear-gradient(180deg, #FF218C 33.33%, #FFD800 33.33%, 66.66%, #21B1FF 66.66%)',
    'linear-gradient(180deg, #181818 12.5%,#784F17 12.5%, 25%, #FE0000 25%, 37.5%,#FD8C00 37.5%, 50%, #FFE500 50%, 62.5%,#119F0B 62.5%, 75%, #0644B3 75%, 87.5%,#C22EDC 87.5%)',
  ];

  const navigate = useNavigate();
  const currentUser = userService.getCurrentUser();

  return <Header>
        <Typography size={'xl'} bold>
            {icons[Math.round(Math.random() * (icons.length - 1))]}
            <PerudoTitle
                onClick={() => navigate('/')}
                loading={loading ? '1' : undefined}
                backgroundColor={backgroundColors[Math.round(Math.random() * (backgroundColors.length - 1))]}>
                perudo
            </PerudoTitle>
            {currentUser && UserModel.emoji(currentUser?.id)}
        </Typography>
    </Header>;
};
