import React, { useMemo, useRef, useState } from 'react';
import './App.css';
import { FirebaseRepository } from './perudo/infra/firebase.repository';
import { UserRepository } from './perudo/infra/user.repository';
import { BrowserRouter as Router, Route, Routes } from 'react-router-dom';
import { PerudoRepository } from './perudo/infra/perudo.repository';
import { Home } from './components/Home';
import { Perudo } from './components/Perudo';
import 'react-toastify/dist/ReactToastify.min.css';
import { UserService } from './perudo/infra/user.service';
import { AppStyle, BackgroundImage, Container, Header, PerudoTitle, Stripe, Typography } from './Styles';
import { ToastContainer } from 'react-toastify';

function App() {

  const projectionRepository = useRef(new FirebaseRepository());
  const backEndUrl: string = useMemo(() => {
    const url = process.env.REACT_APP_BACK_END_URL;
    if (!url) throw new Error('back end url must be defined');
    return url;
  }, []);

  const [loading, setLoading] = useState<boolean>(false);
  const perudoRepository = useMemo(() => new PerudoRepository(backEndUrl, setLoading), [backEndUrl]);
  const userRepository = useMemo(() => new UserRepository(backEndUrl, setLoading), [backEndUrl]);
  const userService = useMemo(() => new UserService(userRepository), [userRepository]);

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

  return (
        <AppStyle>

            <ToastContainer
                position="top-right"
                autoClose={5000}
                hideProgressBar={false}
                newestOnTop={false}
                closeOnClick
                rtl={false}
                pauseOnFocusLoss
                draggable
                pauseOnHover
            />
            <BackgroundImage src="/beach_party.webp"/>

            <Stripe>
                <Header>
                    <Typography size={'xl'} bold>
                        {icons[Math.round(Math.random() * (icons.length - 1))]}
                        <PerudoTitle
                            loading={loading ? '1' : undefined}
                            backgroundColor={backgroundColors[Math.round(Math.random() * (backgroundColors.length - 1))]}>
                            perudo {userService.getCurrentUser()?.name}
                        </PerudoTitle>
                    </Typography>
                </Header>
                <Container>
                    <Router>
                        <Routes>
                            <Route path="/" element={
                                <Home
                                    setLoading={setLoading}
                                    userService={userService}
                                    perudoRepository={perudoRepository}
                                    projectionRepository={projectionRepository.current}
                                />
                            }/>

                            <Route path="games">
                                <Route path=":id" element={
                                    <Perudo perudoRepository={perudoRepository}
                                            projectionRepository={projectionRepository.current}
                                            userService={userService}
                                    />
                                }/>
                            </Route>
                        </Routes>
                    </Router>
                </Container>
            </Stripe>
        </AppStyle>
  );
}

export default App;
