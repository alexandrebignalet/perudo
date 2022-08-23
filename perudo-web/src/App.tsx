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
import { AppStyle, BackgroundImage, Container, Stripe } from './Styles';
import { ToastContainer } from 'react-toastify';
import { PerudoHeader } from './components/PerudoHeader';

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
            <Router>

                <Stripe>
                    <PerudoHeader loading={loading} userService={userService}/>
                    <Container>
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
                    </Container>
                </Stripe>
            </Router>
        </AppStyle>
  );
}

export default App;
