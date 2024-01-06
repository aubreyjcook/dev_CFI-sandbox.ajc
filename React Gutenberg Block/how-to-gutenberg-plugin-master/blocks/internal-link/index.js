/**
 * Block dependencies
 */
import icon from "./icon";
import icons from "./icons";
import "./style.scss";
import "./editor.scss";

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const {
  RichText,
  MediaUpload,
  InnerBlocks,
  useBlockProps,
  InspectorControls,
  ColorPalette,
} = wp.blockEditor;
const { Button, TextControl, PanelBody } = wp.components;

/**
 * Register block
 */
export default registerBlockType("jsforwphowto/internal-link", {
  title: __("Internal Link", "jsforwphowto"),
  description: __("Highlighted area with round image.", "jsforwphowto"),
  category: "common",
  icon: {
    src: icon,
  },
  keywords: [__("Affiliated", "jsforwphowto"), __("Suggested", "jsforwphowto")],
  attributes: {
    imgURL: {
      type: "string",
      source: "attribute",
      attribute: "src",
      selector: ".internal-link-image img",
    },
    imgID: {
      type: "number",
    },
    imgAlt: {
      type: "string",
      source: "attribute",
      attribute: "alt",
      selector: ".internal-link-image img",
    },
    colorPaletteControl: {
      type: "string",
      default: "#eeeeee",
    },
    colorPaletteControl2: {
      type: "string",
      default: "#333333",
    },
    url: {
      type: "string",
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
      attributes: {
        imgID,
        imgURL,
        imgAlt,
        url,
        anchor,
        colorPaletteControl,
        colorPaletteControl2,
      },
      className,
      setAttributes,
      isSelected,
    } = props;
    const blockProps = useBlockProps();
    const onSelectImage = (img) => {
      setAttributes({
        imgID: img.id,
        imgURL: img.url,
        imgAlt: img.alt,
      });
    };
    const onRemoveImage = () => {
      setAttributes({
        imgID: null,
        imgURL: null,
        imgAlt: null,
      });
    };
    return [
      <InspectorControls>
        <PanelBody>
          <TextControl
            label={__("Link", "jsforwphowto")}
            value={url}
            onChange={(url) => setAttributes({ url })}
          />
        </PanelBody>
        <PanelBody>
          <h3>{__("Background Color", "jsforwpblocks")}</h3>
          <ColorPalette
            value={colorPaletteControl}
            onChange={(colorPaletteControl) => {
              setAttributes({ colorPaletteControl });
            }}
          />
          <h3>{__("Text Color", "jsforwpblocks")}</h3>
          <ColorPalette
            value={colorPaletteControl2}
            onChange={(colorPaletteControl2) => {
              setAttributes({ colorPaletteControl2 });
            }}
          />
        </PanelBody>
      </InspectorControls>,
      <>
        <div
          id={anchor}
          className={"internal-link clearfix mt-3 mb-3 " + className}
          style={{ backgroundColor: colorPaletteControl }}
        >
          {!imgID ? (
            <MediaUpload
              onSelect={onSelectImage}
              type="image"
              value={imgID}
              render={({ open }) => (
                <Button className={"button button-large"} onClick={open}>
                  {icons.upload}
                  {__(" Upload Image and set Link in sidebar", "jsforwphowto")}
                </Button>
              )}
            ></MediaUpload>
          ) : (
            <>
              <div class="wp-block-cover internal-link-image border-0">
                <a href={url}>
                  <img
                    loading="lazy"
                    className="wp-block-cover__image-background"
                    alt={imgAlt}
                    src={imgURL}
                    data-object-fit="cover"
                  />
                </a>
              </div>
              {isSelected ? (
                <Button className="remove-image" onClick={onRemoveImage}>
                  {icons.remove}
                </Button>
              ) : null}
            </>
          )}
          <div className="program-info" style={{ color: colorPaletteControl2 }}>
            <div {...blockProps}>
              <InnerBlocks />
            </div>
          </div>
        </div>
      </>,
    ];
  },
  save: (props) => {
    const {
      attributes: {
        className,
        imgURL,
        imgAlt,
        url,
        anchor,
        colorPaletteControl,
        colorPaletteControl2,
      },
    } = props;
    const blockProps = useBlockProps.save();
    return (
      <>
        <div
          id={anchor}
          className={"internal-link clearfix mt-3 mb-3 " + className}
          style={{ backgroundColor: colorPaletteControl }}
        >
          {imgURL && (
            <div className="wp-block-cover internal-link-image border-0">
              <a href={url}>
                <img
                  loading="lazy"
                  className="wp-block-cover__image-background"
                  alt={imgAlt}
                  src={imgURL}
                  data-object-fit="cover"
                />
              </a>
            </div>
          )}
          <div className="program-info" style={{ color: colorPaletteControl2 }}>
            <div {...blockProps}>
              <InnerBlocks.Content />
            </div>
          </div>
        </div>
      </>
    );
  },
});
