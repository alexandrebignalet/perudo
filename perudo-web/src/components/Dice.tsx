import React from 'react';
import { Typography } from '../Styles';

type Props = {
  diceValue: number;
  size?: 's' | 'm';
};

export const Dice: React.FC<Props> = ({ diceValue, size }) => {
  const additionalClassName = size ? size : '';
  switch (diceValue) {
    case 1:
      return <div className={`first-face dice ${additionalClassName}-dice`}>
                <Typography size={size ?? 'xl'}>🦜</Typography>
            </div>;
    case 2:
      return <div className={`second-face dice ${additionalClassName}-dice`}>
                <span className={`dot ${additionalClassName}-dot`}/>
                <span className={`dot ${additionalClassName}-dot`}/>
            </div>;
    case 3:
      return <div className={`third-face dice ${additionalClassName}-dice`}>
                <span className={`dot ${additionalClassName}-dot`}/>
                <span className={`dot ${additionalClassName}-dot`}/>
                <span className={`dot ${additionalClassName}-dot`}/>
            </div>;
    case 4:
      return <div className={`fourth-face dice ${additionalClassName}-dice`}>
                <div className="column">
                    <span className={`dot ${additionalClassName}-dot`}/>
                    <span className={`dot ${additionalClassName}-dot`}/>
                </div>
                <div className="column">
                    <span className={`dot ${additionalClassName}-dot`}/>
                    <span className={`dot ${additionalClassName}-dot`}/>
                </div>
            </div>;
    case 5:
      return <div className={`fifth-face dice ${additionalClassName}-dice`}>
                <div className="column">
                    <span className={`dot ${additionalClassName}-dot`}/>
                    <span className={`dot ${additionalClassName}-dot`}/>
                </div>
                <div className="column">
                    <span className={`dot ${additionalClassName}-dot`}/>
                </div>
                <div className="column">
                    <span className={`dot ${additionalClassName}-dot`}/>
                    <span className={`dot ${additionalClassName}-dot`}/>
                </div>
            </div>;
    case 6:
      return <div className={`sixth-face dice ${additionalClassName}-dice`}>
                <div className="column">
                    <span className={`dot ${additionalClassName}-dot`}/>
                    <span className={`dot ${additionalClassName}-dot`}/>
                    <span className={`dot ${additionalClassName}-dot`}/>
                </div>
                <div className="column">
                    <span className={`dot ${additionalClassName}-dot`}/>
                    <span className={`dot ${additionalClassName}-dot`}/>
                    <span className={`dot ${additionalClassName}-dot`}/>
                </div>

            </div>;
    default:
      return <>WEIRD DICE VALUE {diceValue}</>;
  }
};








