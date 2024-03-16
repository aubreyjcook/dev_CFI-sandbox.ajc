/**
 * Block dependencies
 */
import icon from "./icon";
import "./style.scss";
import "./editor.scss";

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls } = wp.blockEditor;
const { ColorPalette } = wp.editor;

const { PanelBody } = wp.components;

/**
 * Register block
 */
export default registerBlockType("jsforwphowto/cfi-list", {
  title: __("Bullet List", "jsforwphowto"),
  description: __("A list with colorful squares.", "jsforwphowto"),
  category: "common",
  icon: {
    src: icon,
  },
  keywords: [__("List", "jsforwphowto")],
  attributes: {
    list: {
      type: "array",
      source: "children",
      selector: ".bullet-list",
    },
    colorPaletteControl: {
      type: "string",
      default: "#ea5213",
    },
    colorPaletteControl2: {
      type: "string",
      default: "#333",
    },
    anchor: {
      type: "string",
    },
  },
  supports: {
    anchor: true,
  },
  edit: (props) => {
    const {
      attributes: { list, colorPaletteControl, colorPaletteControl2, anchor },
      className,
      setAttributes,
    } = props;
    const onChangeHeading = (list) => {
      setAttributes({ list });
    };
    const bulletClass = "a" + colorPaletteControl.substring(1);
    return (
      <>
        <InspectorControls>
          <PanelBody>
            <h3>{__("Text Color", "jsforwpblocks")}</h3>
            <ColorPalette
              value={colorPaletteControl2}
              onChange={(colorPaletteControl2) => {
                setAttributes({ colorPaletteControl2 });
              }}
            />
            <h3>{__("Bullet Color", "jsforwpblocks")}</h3>
            <ColorPalette
              value={colorPaletteControl}
              onChange={(colorPaletteControl) => {
                setAttributes({ colorPaletteControl });
              }}
            />
          </PanelBody>
        </InspectorControls>
        <div id={anchor} className={bulletClass + " " + className}>
          <style
            dangerouslySetInnerHTML={{
              __html: `
              .${bulletClass} .bullet-list li:before {
                content: "";
                height: 20px;
                width: 20px;
                background-color: ${colorPaletteControl};
                margin-right: 15px;
                display: inline-block;
              }`,
            }}
          />
          <RichText
            className="bullet-list"
            tagName="ul"
            multiline="li"
            placeholder={__("Add your list items", "jsforwphowto")}
            onChange={onChangeHeading}
            style={{
              listStyleType: "none",
              color: colorPaletteControl2 + " !important",
            }}
            value={list}
          />
        </div>
      </>
    );
  },
  save: (props) => {
    const {
      attributes: {
        list,
        colorPaletteControl,
        colorPaletteControl2,
        className,
        anchor,
      },
    } = props;
    const bulletClass = "a" + colorPaletteControl.substring(1);
    return (
      <>
        <style
          dangerouslySetInnerHTML={{
            __html: `
              .${bulletClass} .bullet-list li:before {
                content: "";
                height: 20px;
                width: 20px;
                background-color: ${colorPaletteControl};
                margin-right: 15px;
                display: inline-block;
              }`,
          }}
        />
        <div id={anchor} class={bulletClass + " " + className}>
          <ul
            class="bullet-list"
            style={{
              listStyleType: "none",
              color: colorPaletteControl2 + " !important",
            }}
          >
            {list}
          </ul>
        </div>
      </>
    );
  },
});
