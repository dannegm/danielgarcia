import React, { useRef, useEffect } from 'react';
import * as THREE from 'three';

import useWindowSize from '@/shared/hooks/useWindowSize';
import useAnimationFrame from '@/shared/hooks/useAnimationFrame';

import { Wrapper, Canvas } from './Galaxy.styled';

const Renderer = () => {
    const renderer = new THREE.WebGLRenderer({
        alpha: true,
    });
    return renderer;
};

const Scene = () => {
    const scene = new THREE.Scene();
    scene.fog = new THREE.Fog(0x222222, 1, 1000);
    return scene;
};

const Camera = (width, height) => {
    const camera = new THREE.PerspectiveCamera(40, width / height);
    camera.position.set(20, 90, 500);
    return camera;
};

const Ambient = ({ scene }) => {
    const directionalLight = new THREE.DirectionalLight(0xc7b198);
    directionalLight.position.set(-500, 400, 2100);
    scene.add(directionalLight);

    const light = new THREE.AmbientLight(0xdddddd, 0.5);
    scene.add(light);
};

const Stars = ({ scene }) => {
    const stars = new THREE.Object3D();
    for (let i = 0; i < 800; i += 1) {
        const geometry = new THREE.IcosahedronGeometry(Math.random() * 2, 0);
        const material = new THREE.MeshToonMaterial({ color: 0xcccccc });
        const mesh = new THREE.Mesh(geometry, material);

        mesh.position.x = (Math.random() - 0.5) * 700;
        mesh.position.y = (Math.random() - 0.5) * 700;
        mesh.position.z = (Math.random() - 0.5) * 700;

        mesh.rotation.x = Math.random() * 2 * Math.PI;
        mesh.rotation.y = Math.random() * 2 * Math.PI;
        mesh.rotation.z = Math.random() * 2 * Math.PI;

        stars.add(mesh);
    }

    scene.add(stars);

    return stars;
};

const onFrameUpdate = ({ stars }) => {
    if (stars.rotation) {
        // eslint-disable-next-line no-param-reassign
        stars.rotation.y += 0.0009;
        // eslint-disable-next-line no-param-reassign
        stars.rotation.z -= 0.0003;
    }
};

const Galaxy = () => {
    const $canvas = useRef(null);

    const renderer = Renderer();

    const [width, height] = useWindowSize(([w, h]) => renderer.setSize(w, h));

    const scene = Scene();
    const camera = Camera(width, height);

    Ambient({ scene });
    const stars = Stars({ scene });

    useAnimationFrame(() => {
        onFrameUpdate({ stars });
        renderer.render(scene, camera);
    });

    useEffect(() => {
        if ($canvas.current) {
            $canvas.current.appendChild(renderer.domElement);
        }
    }, [$canvas]);

    return (
        <Wrapper>
            <Canvas ref={$canvas} />
        </Wrapper>
    );
};

export default Galaxy;
