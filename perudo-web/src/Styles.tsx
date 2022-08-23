import styled from 'styled-components';

export const AppStyle = styled.div`
    height: 100%;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
`;
export const BackgroundImage = styled.img`
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1;
`;

export const Stripe = styled.div`
    border-radius: 10px;
    min-height: 100%;
    margin: auto;
    background-color: #fbbc967d;
    box-sizing: border-box;
    box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.70);
    display: flex;
    flex-direction: column;
`;

export const Header = styled.div`
    width: 100%;
    display: flex;
    box-sizing: border-box;
    justify-content: space-between;
    align-items: center;
    padding: 0 16px 0 24px;
    height: 88px;
`;

function tshirtToPx(size: 's' | 'm' | 'l' | 'xl') {
  switch (size) {
    case 's':
      return '14px';
    case 'm':
      return '20px';
    case 'l':
      return '32px';
    case 'xl':
      return '48px';
  }
}

type TypographyProps = {
  size: 's' | 'm' | 'l' | 'xl';
  bold?: boolean;
  shake?: boolean;
};

export const Typography = styled.div<TypographyProps>`
    display: inline-block;
    font-weight: ${({ bold }) => bold ? 'bold' : 'inherit'};
    font-size: ${({ size }) => tshirtToPx(size)};
    animation: ${({ shake }) => shake ? 'shake 1.2s ease-in-out infinite' : 'none'};}scale(2);
`;

type PerudoTitleProps = {
  backgroundColor: string;
  loading?: string;
};


export const PerudoTitle = styled.span<PerudoTitleProps>`
    border-radius: 10px;
    padding: 8px;
    margin: 0 10px;
    color: white;
    background: ${({ backgroundColor }) => backgroundColor};
    text-shadow: .1em .1em 0 hsl(200 50% 30%);
    animation: ${({ loading }) => loading === '1' ? 'shadows 1.2s ease-in infinite, move 1.2s ease-in infinite' : 'none'};
`;

export const InputContainer = styled.div`
    border-radius: 10px;
    background-color: #edc7c7;
    color: #ed0166;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    display: flex;
    height: 45px;
    padding: 5px;
    width: 100%;
`;

export const PerudoInput = styled.input`
    width: 100%;
    text-align:center;
    background-color: inherit;
    color: inherit;
    padding: 5px;
    font-size: 20px;
    border: none;
    appearance: none;
    font-weight: bold;

    &:focus {
        outline: none;
    }
    &::placeholder {
        color: #ee0165b8;
    }
`;

export const PerudoSelectInput = styled.select`
    background-color: inherit;
    color: inherit;
    padding: 5px;
    text-align:center;
    width: 100%;
    font-size: 20px;
    border: none;
    appearance: none;
    font-weight: bold;

    &:focus {
        outline: none;
    }
    &::placeholder {
        color: #ee0165b8;
    }
`;

export const Container = styled.div`
    padding: 10px;
    display: flex;
    flex-direction: column;
    flex: 1;
`;

type PerudoButtonProps = {
  fullWidth?: boolean;
};
export const PerudoButton = styled.button<PerudoButtonProps>`
    height: 50px;
    padding: 5px 10px 5px 10px;
    border: 1px solid #f575f5;
    border-radius: 10px;
    cursor: pointer;
    box-shadow: 3px 4px 2px 1px #f44789;
    background-color: #cf01c4;
    ${({ fullWidth }) => fullWidth ? 'width: 100%;' : ''}
    &:hover {
        background-color: #ed0166;
    }

    &:active {
        background-color: #ed0166;
        box-shadow: 2px 2px 1px 1px #bf1662;
        transform: translateY(4px);
    }
`;


type PerudoButtonTextProps = {
  size: 's' | 'm' | 'l' | 'xl';
  disabled?: boolean;
};

export const PerudoButtonText = styled.span<PerudoButtonTextProps>`
    font-weight: bold;
    color: white;
    font-size: ${({ size }) => tshirtToPx(size)};
    user-select: none;
    animation: ${({ disabled }) => disabled ? 'none' : 'shadows 1.2s ease-in infinite, move 1.2s ease-in infinite'};
`;

export const HomeLoggedIn = styled.div`
    display: flex;
    flex-direction: column;
    flex: 1;
    gap: 20px;
`;

export const Box = styled.div`
    padding: 10px;
    border-radius: 10px;
    background-color: #70f3d8c2;
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    color: #411334;
`;

export const GamePlayerList = styled.ul`
    list-style: none;
`;

export const Column = styled.div`
    margin-top: 30px;
    display: flex;
    flex-direction: column;
    align-items:center;
    justify-content-center;
    width: 100%;
    gap: 10px;
`;

type RowProps = {
  margin?: string;
  minHeight?: string;
};
export const Row = styled.div<RowProps>`
    display: flex;
    width: 100%;
    justify-content: space-around;
    align-items: center;
    ${({ margin }) => `margin: ${margin};` ?? ''}
    ${({ minHeight }) => `min-height: ${minHeight};` ?? ''}
`;

export const BetStyle = styled.div`
    margin-top: 30px;
    display: flex;
    align-items: center;
    justify-items: center;
    flex-direction: column;
`;

export const DiceNumber = styled.div`
    font-size: 1.5em;
    text-align: center;
    background-color: #fde27c;
    border-radius: 10px;
    padding: 1.8em;
    color: #ff636a;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    border: 2px solid #ff616c;
`;

export const Palefico = styled.div`
    margin-top: 30px;
    padding: 20px;
    text-align: center;
    border-radius: 10px;
    background-color: #421437;
    box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
    color: #fe646b;
`;
